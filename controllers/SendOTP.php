<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



require '../mailer/autoload.php';



$mail = new PHPMailer(true); //defaults to using php "mail()"; the true param means it will throw exceptions on errors, which we need to catch

try {

    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'elzozatandbasselco@gmail.com';
    $mail->Password = 'zwdajtpmlvvgvmij';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

        $mail->setFrom('elzozatandbasselco@gmail.com' , 'ElZozat and Bassel CO.');
        $mail->addAddress("zyadatefali12@gmail.com");


        $mail->isHTML(true);
        $mail->Subject = "Your Verification code";

        $mail->Body = "<p> ya nigga ya zingy t3ala msms</p>";

 
        $mail->Send();
        echo "Message Sent OK\n";

    } catch ( Exception $e) {

        echo $e->errorMessage(); //Pretty error messages from PHPMailer
    
    }




?>