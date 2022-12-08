<?php
    
namespace App\Controller;

namespace App\Controller;

use App\Helper\GenerateHelper as GenerateHelper;
use App\Model\UserModel as UserModel;
use App\Helper\ValidateHelper as ValidateHelper;
use App\Helper\InputHelper as InputHelper;
use App\Helper\HashHelper as HashHelper;
use App\Helper\ResponseHelper as ResponseHelper;
use App\Helper\EmailHelper as EmailHelper;
use App\Helper\LevelHelper as LevelHelper;
use App\Model\LoginModel as LoginModel;
use App\Model\PasswordRequestModel as PasswordRequestModel;
use Configuration\Server as Server;


class UserController {
     public function view(array $data){
         $user = (new UserModel())->find();
         if ($user->count() > 0) {
             $user = $user->fetch(true);
             foreach ($user as $userItem){
                 var_dump($userItem->data());    
             }
         }
         else {
             echo $user->fail()->getMessage();
         }

     }

     public function add(array $data) {
        $token = $_SERVER['HTTP_TOKEN'];
        if (ValidateHelper::checkToken($token)) {
            $permissions = LevelHelper::getPermissions($token);
            if ($permissions != null) {
                if (LevelHelper::hasCreateUserPermission($permissions)) {
                    $user = new UserModel();
                    $user->sid = GenerateHelper::randomSid();
                    $user->name = $data['name'];
                    $user->email = $data['email'];
                    if (!InputHelper::isValidEmail($data['email'])) {
                        ResponseHelper::send(REQUEST_ERROR, 'Email is invalid');
                    }
                    $user->password = HashHelper::encrypt($data['password'], $user->sid);
                    if (!InputHelper::isValidPassword($data['password']) && $data['password'] != $data['passwordConfirm']){
                        ResponseHelper::send(REQUEST_ERROR, 'Password is invalid');
                    }
                    $user->permission_type= $data['permission'];
                    if($user->save()){
                        ResponseHelper::send(RESPONSE_SUCCESS, 'O cadastro foi concluído');
                    } 
                    else {
                        ResponseHelper::send(REQUEST_ERROR, 'Houve um erro na efetivação do cadastro');
                    }
                } else {
                    ResponseHelper::send(
                        REQUEST_ERROR,
                        'Usuário não tem permissão para cadastrar um novo usuário'
                    );
                }
            } else {
                ResponseHelper::send(
                    RESPONSE_ERROR,
                    'Ocorreu um erro ao verificar as permissões do usuário'
                );
            }
        } else {
            ResponseHelper::send(TOKEN_ERROR, 'Usuário não está logado');
        }
     }

    public function requestPassword(array $data): void {
        $email = $data['email'];
        if (InputHelper::isValidEmail($email)) {
            if ((new UserModel())->find('email = :email', 'email=' . $email)->count() > 0) {
                $token = GenerateHelper::randomToken();
                $hashedToken = HashHelper::encrypt($token, substr($token, 0, 12));
                $expireDate = new \DateTime();
                $expireDate->add(new \DateInterval('P1D'));
                $passwordRequest = (new PasswordRequestModel())->find(
                    'email = :email',
                    'email=' . $email
                );
                if ($passwordRequest->count() > 0) {
                    $passwordRequest = $passwordRequest->fetch();
                    $updatedAt = \DateTime::createFromFormat(
                        DEFAULT_DATETIME_FORMAT,
                        $passwordRequest->updated_at
                    );
                    if ($updatedAt > (new \DateTime())->sub(
                        new \DateInterval('P0Y0M0DT0H1M')
                    )) {
                        ResponseHelper::send(
                            REQUEST_ERROR,
                            'Espere ao menos 1 minuto para poder requisitar nova redefinição de senha'
                        );
                    }
                }
                $passwordRequest->email = $email;
                $passwordRequest->token = $hashedToken;
                $passwordRequest->expire_date = $expireDate->format(DEFAULT_DATETIME_FORMAT);

                 $passwordRequest = (new PasswordRequestModel())->find(
                    'email = :email',
                    'email=' . $email
                 );
                 if ($passwordRequest->count() > 0) {
                    $passwordRequest = $passwordRequest->fetch();
                }
                $passwordRequest->email = $email;
                $passwordRequest->token = $hashedToken;
                $passwordRequest->expire_date = $expireDate->format(DEFAULT_DATETIME_FORMAT);

                $resetPasswordUrl = Server::getRootUrl() . '/reset_password.html?email=' .
                    $email . '&token=' . $token;

                $message = '<h2>Recuperação de senha do usuário ' . $email . '</h2>';
                $message .= '<p>Para redefinir sua senha, clique no botão abaixo ou siga o seguinte link: ' .
                    $resetPasswordUrl . '.</p>';
                $message .= '<a target="blank" href="' .
                    $resetPasswordUrl .
                    '" style="position: relative; display: block; width: max-content; margin: 10px auto; padding: 10px 20px; border-radius: 10px; font-size: 1rem; text-decoration: none; color: #f2f2f2; background-color: #d97904">Redefinir senha</a>';
                $message .= '<p>Caso você não tenha requisitado a recuperação de senha, por favor, ignore esta mensagem.</p>';

                if ($passwordRequest->save()) {
                    if (EmailHelper::send($email, 'Recuperação de senha', $message)) {
                        ResponseHelper::send(
                            RESPONSE_SUCCESS,
                            'Um email foi enviado com um link para redefinir sua senha'
                        );
                    } else {
                        ResponseHelper::send(RESPONSE_ERROR, 'Não foi possível enviar email');
                    }
                } else {
                    ResponseHelper::send(RESPONSE_ERROR, 'Ocorreu um erro requisitar nova senha');
                }
            } else {
                ResponseHelper::send(REQUEST_ERROR, 'O usuário não existe');
            }
        } else {
            ResponseHelper::send(REQUEST_ERROR, 'Email inválido');
        }
    }

    public function resetPassword(array $data): void {
        $email = $data['email'];
        $token = $data['token'];
        $password = $data['password'];
        $repeatedPassword = $data['repeated-password'];
        if (InputHelper::isValidEmail($email)) {
            if (InputHelper::isValidPassword($password)) {
                if ($password === $repeatedPassword) {
                    $hashedToken = HashHelper::encrypt($token, substr($token, 0, 12));
                    $passwordRequest = (new PasswordRequestModel())->find(
                        'email = :email AND token = :token',
                        'email=' . $email . '&token=' . $hashedToken
                    );
                    if ($passwordRequest->count() > 0) {
                        $passwordRequest = $passwordRequest->fetch();
                        $expireDate = \DateTime::createFromFormat(
                            DEFAULT_DATETIME_FORMAT,
                            $passwordRequest->expire_date
                        );
                        if ($expireDate >= new \DateTime()) {
                            $user = (new UserModel())->find('email = :email', 'email=' . $email);
                            if ($user->count() > 0) {
                                $user = $user->fetch();
                                $user->password = HashHelper::encrypt($password, $user->sid);
                                if ($user->save()) {
                                    $passwordRequest->destroy();
                                    ResponseHelper::send(
                                        RESPONSE_SUCCESS,
                                        'Senha redefinida com sucesso'
                                    );
                                } else {
                                    ResponseHelper::send(
                                        REQUEST_ERROR,
                                        'Ocorreu um erro ao redefinir senha'
                                    );
                                }
                            } else {
                                ResponseHelper::send(REQUEST_ERROR, 'O usuário não foi encontrado');
                            }
                        } else {
                            ResponseHelper::send(
                                REQUEST_ERROR,
                                'A data limite para redefinição de senha expirou'
                            );
                        }
                    } else {
                        ResponseHelper::send(REQUEST_ERROR, 'Redefinição de senha negada');
                    }
                } else {
                    ResponseHelper::send(REQUEST_ERROR, 'As senhas não coincidem');
                }
            } else {
                ResponseHelper::send(REQUEST_ERROR, 'Nova senha inválida');
            }
        } else {
            ResponseHelper::send(REQUEST_ERROR, 'Email inválido');
        }
    }

    public function getPermissions(array $data): void {
        $token = $_SERVER['HTTP_TOKEN'];
        if (ValidateHelper::checkToken($token)) {
            $permissions = LevelHelper::getPermissions($token);
            if ($permissions != null) {
                ResponseHelper::send(
                    RESPONSE_SUCCESS,
                    'Permissões resgatadas com sucesso',
                    $permissions
                );
            } else {
                ResponseHelper::send(
                    RESPONSE_ERROR,
                    'Ocorreu um erro ao verificar as permissões do usuário'
                );
            }
        } else {
            ResponseHelper::send(TOKEN_ERROR, 'Usuário não está logado');
        }
    }
}
    
?>
