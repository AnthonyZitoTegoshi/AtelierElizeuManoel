<?php

namespace App\Controller;

use App\Model\UserModel as UserModel;
use App\Model\LoginModel as LoginModel;
use App\Helper\HashHelper as HashHelper;
use App\Helper\InputHelper as InputHelper;
use App\Helper\GenerateHelper as GenerateHelper;
use App\Helper\ResponseHelper as ResponseHelper;
use App\Helper\ValidateHelper as ValidateHelper;
use Configuration\Server as Server;

class LoginController {
    public function login(array $data): void {
        $email = $data['email'];
        $password = $data['password'];

        if (InputHelper::isValidEmail($email) && InputHelper::isValidPassword($password)) {
            $user = (new UserModel())->find('email = :email', 'email=' . $email);
            if ($user->count() === 1) {
                $user = $user->fetch();
                $hashedPassword = HashHelper::encrypt($password, $user->sid);
                if ($user->password == $hashedPassword) {
                    $login = (new LoginModel())->find(
                        'user_sid = :user_sid',
                        'user_sid=' . $user->sid
                    );
                    if ($login->count() > 0) {
                        $login = $login->fetch();
                    }
                    $token = GenerateHelper::randomToken();
                    $hashedToken = HashHelper::encrypt($token, substr($token, 0, 12));
                    $expireDate = new \DateTime();
                    $expireDate->add(new \DateInterval('P3D'));
                    $login->user_sid = $user->sid;
                    $login->token = $hashedToken;
                    $login->expire_date = $expireDate->format(DEFAULT_DATETIME_FORMAT);
                    if ($login->save()) {
                        setcookie(
                            'token',
                            $token,
                            time() + 60 * 60 * 24 * 3,
                            Server::getCookiesPath(),
                            Server::getCookiesDomain(),
                            $_SERVER['HTTP_HOST'] == 'localhost' ? false : true
                        );
                        ResponseHelper::send(RESPONSE_SUCCESS, 'Usuário logado com sucesso', $token);   
                    } else {
                        ResponseHelper::send(RESPONSE_ERROR, 'Ocorreu um erro ao logar o usuário');
                    }
                } else {
                    ResponseHelper::send(REQUEST_ERROR, 'Senha incorreta');
                }
            } else {
                ResponseHelper::send(REQUEST_ERROR, 'O usuário não existe');
            }
        } else {
            ResponseHelper::send(REQUEST_ERROR, 'Email e/ou senha inválidos');
        }
    }

    public function logout(array $data): void {
        $token = $_SERVER['HTTP_TOKEN'];
        if (ValidateHelper::checkToken($token)) {
            $hashedToken = HashHelper::encrypt($token, substr($token, 0, 12));
            $login = (new LoginModel())->find('token = :token', 'token=' . $hashedToken)->fetch();
            if ($login->destroy()) {
                ResponseHelper::send(RESPONSE_SUCCESS, 'Usuário deslogado com sucesso');
            } else {
                ResponseHelper::send(RESPONSE_ERROR, 'Ocorreu um erro ao deslogar o usuário');
            }
        } else {
            ResponseHelper::send(RESPONSE_SUCCESS, 'Sessão expirada');
        }
    }

    public function isLogged(array $data): void {
        $token = $_SERVER['HTTP_TOKEN'];
        if (ValidateHelper::checkToken($token)) {
            ResponseHelper::send(RESPONSE_SUCCESS, 'Usuário já está logado');
        }
        ResponseHelper::send(REQUEST_ERROR, 'Sessão expirada');
    }
}
