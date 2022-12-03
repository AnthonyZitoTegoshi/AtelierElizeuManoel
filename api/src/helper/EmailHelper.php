<?php

namespace App\Helper;

use PHPMailer\PHPMailer\PHPMailer as PHPMailer;

class EmailHelper {
    static function send(string $email, string $subject, string $message): bool {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->Host = EMAIL_CONFIG['host'];
        $mail->SMTPAuth = EMAIL_CONFIG['auth'];
        $mail->Username = EMAIL_CONFIG['username'];
        $mail->Password = EMAIL_CONFIG['password'];
        $mail->SMTPSecure = EMAIL_CONFIG['encryption'];
        $mail->Port = EMAIL_CONFIG['port'];
        $mail->setFrom(EMAIL_CONFIG['username'], 'Atelier Elizeu Manoel');
        $mail->addAddress($email);
        $mail->Subject = $subject;
        $mail->Body = $message;
        return $mail->send();
    }
}
