<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try{

    $mail->isSMTP();

    $mail->Host = 'smtp.gmail.com';

    $mail->SMTPAuth = true;

    $mail->Username = 'hemantsaini5238@gmail.com';

    $mail->Password = 'yefd pdws ihck ycxv';

    $mail->SMTPSecure = 'tls';

    $mail->Port = 587;

    $mail->setFrom(
        'hemantsaini5238@gmail.com',
        'Test Mail'
    );

    $mail->addAddress('hemantsainisss119@gmail.com');

    $mail->isHTML(true);

    $mail->Subject = 'PHPMailer Test';

    $mail->Body = '<h2>Hii Hemant Your email process is working now!..</h2>';

    $mail->send();

    echo "Mail Sent";

}catch(Exception $e){

    echo $mail->ErrorInfo;
}