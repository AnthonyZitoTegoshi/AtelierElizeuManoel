<?php

namespace App\Helper;

use PHPMailer\PHPMailer\PHPMailer as PHPMailer;

class EmailHelper {
    static function send(string $email, string $subject, string $message): bool {
        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
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
        } else {
            $headers = [
                'From' => 'Atelier Elizeu Manoel \<' . EMAIL_CONFIG['username'] . '\>',
                'MIME-Version' => '1.0',
                'X-Mailer' => 'PHP/' . phpversion(),
                'Content-Type' => 'text/html; charset=utf-8'
            ];
            return mail($email, $subject, $message, $headers);
        }
    }
}
