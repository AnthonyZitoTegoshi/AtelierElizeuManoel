<?php

class HashHelper {
    static function encrypt($text, $salt) {
        $textLength = strlen($text);
        $saltedText = substr($salt, 0, 4) . substr($text, 0, floor($textLength / 2));
        if ($textLength % 2 == 0) {
            $saltedText .= substr($salt, 4, 4) . substr($text, $textLength / 2, $textLength / 2) . substr($salt, 8, 4);
        } else {
            $saltedText .= substr($salt, 4, 2) . substr($text, floor($textLength / 2), 1) . substr($salt, 6, 2) . substr($text, floor($textLength / 2) + 1, floor($textLength / 2)) . substr($salt, 8, 4);
        }
        return hash("sha256", $saltedText);
    }
}

?>