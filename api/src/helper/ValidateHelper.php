<?php

namespace App\Helper;

use App\Model\LoginModel as LoginModel;

class ValidateHelper {
    static function checkToken(string $token): bool {
        $hashedToken = HashHelper::encrypt($token, substr($token, 0, 12));
        $login = (new LoginModel())->find('token = :token', 'token=' . $hashedToken);
        if ($login->count() > 0) {
            $login = $login->fetch();
            $expireDate = \DateTime::createFromFormat(
                DEFAULT_DATETIME_FORMAT,
                $login->expire_date,
            );
            if ($expireDate >= new \DateTime()) {
                return true;
            }
        }
        return false;
    }
}
