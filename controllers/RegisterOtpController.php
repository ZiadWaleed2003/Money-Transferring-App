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

                    // ToDo : continue the validation of the data and inserting it to the DB
              
                    //     $embd_serialized = serialize($embedds);
                    
                //    $query = 
                //    $sql = "INSERT INTO `image` (`id`, `user_id`, `vector_data`) VALUES ('1', '10', '$embd_serialized')";

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