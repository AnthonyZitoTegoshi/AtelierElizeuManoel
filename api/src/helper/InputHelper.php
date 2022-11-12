<?php

namespace App\Helper;

class InputHelper {
    static function isValidEmail(?string $email): bool {
        if ($email == null) {
            return false;
        }
        return preg_match(
            '/^[A-Za-z0-9_]+(\.[A-Za-z0-9_]+)*@[A-Za-z0-9_]+(\.[A-Za-z0-9_]+)+$/',
            $email,
        ) ? true : false;
    }

    static function isValidPassword(?string $password): bool {
        if ($password == null) {
            return false;
        }
        return preg_match('/^[^\"\']+$/', $password) ? true : false;
    }
}
