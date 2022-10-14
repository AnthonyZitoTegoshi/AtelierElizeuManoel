<?php

class InputHelper {
    static function isValidEmail($email) {
        if ($email == NULL) {
            return FALSE;
        }
        return preg_match("/^[A-Za-z0-9_]+(\.[A-Za-z0-9_]+)*@[A-Za-z0-9_]+(\.[A-Za-z0-9_]+)+$/", $email);
    }

    static function isValidPassword($password) {
        if ($password == NULL) {
            return FALSE;
        }
        return preg_match("/^[^\"\']+$/", $password);
    }
}

?>