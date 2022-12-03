<?php

namespace App\Controller;

use App\Helper\EmailHelper as EmailHelper;
use App\Helper\GenerateHelper as GenerateHelper;
use App\Helper\HashHelper as HashHelper;
use App\Helper\InputHelper as InputHelper;
use App\Helper\ResponseHelper as ResponseHelper;
use App\Model\PasswordRequestModel as PasswordRequestModel;
use App\Model\UserModel as UserModel;
use Configuration\Server as Server;

class UserController {
    public function requestPassword(array $data): void {
        $email = $data['email'];
        if (InputHelper::isValidEmail($email)) {
            if ((new UserModel)->find('email = :email', 'email=' . $email)->count() > 0) {
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
                }
                $passwordRequest->email = $email;
                $passwordRequest->token = $hashedToken;
                $passwordRequest->expire_date = $expireDate->format(DEFAULT_DATETIME_FORMAT);

                $resetPasswordUrl = Server::getRootUrl() . '/reset_password.html?email=' .
                    $email . '&token=' . $token;

                if ($passwordRequest->save()) {
                    if (EmailHelper::send($email, 'Recuperação de senha', $resetPasswordUrl)) {
                        ResponseHelper::send(
                            RESPONSE_SUCCESS,
                            'Um email foi enviado com um link para resetar sua senha'
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
}
