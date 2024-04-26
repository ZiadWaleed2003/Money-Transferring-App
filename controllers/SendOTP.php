<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require 'path/to/PHPMailer/src/Exception.php';
// require 'path/to/PHPMailer/src/PHPMailer.php';
// require 'path/to/PHPMailer/src/SMTP.php';

require '../mailer/autoload.php';

$mail = new PHPMailer();

    $mail->SMTPDebug = 3;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'elzozatandbasselco@gmail.com';
    $mail->Password = '123456789elzozatandbassel';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 465;

    $mail->setFrom('elzozatandbasselco@gmail.com' , 'ElZozat and Bassel CO.');
    $mail->addAddress("ziadwaleedmohamed2003@gmail.com");


    $mail->isHTML(true);
    $mail->Subject = "Your Verification code";

    $mail->Body = "<p>Your verification code is 1234</p>";


    if($mail->send()){

        echo"Email sent";
    }else{
        echo "Email failed to sent";
    }




?>