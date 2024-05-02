<?php


require("../Models/SignUp.php");
require("CRUD.php");

if(isset($_POST['OtpSubmit'])){

    $otp = trim(htmlspecialchars($_POST['otp']));


    if(isset($otp)){

        $sys_otp = $_SESSION['otp'];

        if( $sys_otp != false){
            
            if($sys_otp == $otp){
            

                $fileInfo = pathinfo($_SESSION['img_path']);
                $filename = $fileInfo['basename'];


                $embedds = Signup::sendingApiRequest($_SESSION['img_path'] , $filename);

                if($embedds != false){

                    
                    
                   


                }


            }else{

                unlink($_SESSION['img_path']);
            }




        }else{

            unlink($_SESSION['img_path']);
        }
    }
}


?>