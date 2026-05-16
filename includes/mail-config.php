<?php

use PHPMailer\PHPMailer\PHPMailer;

require __DIR__ . '/../vendor/autoload.php';

function sendMail($to,$subject,$body)
{

    $mail = new PHPMailer(true);

    try{

        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';

        $mail->SMTPAuth = true;

        $mail->Username = 'hemantsaini5238@gmail.com';

        $mail->Password = 'yefd pdws ihck ycxv';

        $mail->SMTPSecure = 'tls';

        $mail->Port = 587;

        $mail->SMTPOptions = [

            'ssl' => [

                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true

            ]

        ];

        $mail->setFrom(
            'hemantsaini5238@gmail.com',
            'GIIT INDIA'
        );

        $mail->addAddress($to);

        $mail->isHTML(true);

        $mail->Subject = $subject;

        $mail->Body = $body;

        return $mail->send();

    }catch(Exception $e){

        return false;
    }
}