<?php

class GenerateHelper {
    static function getOptions() {
        return ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
    }

    static function randomId() {
        $options = GenerateHelper::getOptions();
        $id = "";
        for ($i = 0; $i < 12; $i++) {
            $id .= $options[random_int(0, count($options) - 1)];
        }
        return $id;
    }

    static function randomToken() {
        $options = GenerateHelper::getOptions();
        $token = "";
        for ($i = 0; $i < 64; $i++) {
            $token .= $options[random_int(0, count($options) - 1)];
        }
        return $token;
    }
}

?>