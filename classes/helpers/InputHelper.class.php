<?php

class InputHelper {
    static function isValidEmail($email) {
        if ($email == NULL) {
            return FALSE;
        }
        return preg_match("/^[A-Za-z0-9_\.]{1,}@[A-Za-z0-9_\.]{1,}\.[A-Za-z0-9_\.]{1,}$/", $email); // !change
    }

    static function isValidPassword($password) {
        if ($password == NULL || $password == "") {
            return FALSE;
        }
        return TRUE;
    }
}

?>