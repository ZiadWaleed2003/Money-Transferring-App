<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



require '../mailer/autoload.php';


class moneySystem{


    public static function SendOTP($user_email){

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
            $mail->addAddress($user_email);
            $mail->isHTML(true);
            $mail->Subject = "Your Verification code";

            $otp = moneySystem::generateOTP(6);
        
                $mail->Body = "
                        <html>
                        <head>
                        <title>Your One-Time Password (OTP)</title>
                        </head>
                        <body>
                        <p>We sent you this code to verify your identity</p>
                        <p><b>Your One-Time Password (OTP) is: </b></p>
                        <h1 style='font-size: 24px; font-weight: bold; text-align: center;'>[$otp]</h1>
                        </body>
                        </html>";
        
         
                $mail->Send();

                $_SESSION['otp'] = $otp;

                echo "Message Sent OK\n";
        
            } catch ( Exception $e) {
        
                echo $e->errorMessage(); //Pretty error messages from PHPMailer
            
            }

    }



    private static function  generateOTP($n) { 
      
        // Take a generator string which consist of 
        // all numeric digits 
        $generator = "1357902468"; 
      
        // Iterate for n-times and pick a single character 
        // from generator and append it to $result 
          
        // Login for generating a random character from generator 
        //     ---generate a random number 
        //     ---take modulus of same with length of generator (say i) 
        //     ---append the character at place (i) from generator to result 
      
        $result = ""; 
      
        for ($i = 1; $i <= $n; $i++) { 
            $result .= substr($generator, (rand()%(strlen($generator))), 1); 
        } 
      
        // Return result 
        return $result; 
    } 
}

?>