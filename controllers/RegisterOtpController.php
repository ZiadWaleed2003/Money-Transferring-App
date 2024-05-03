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

                    $user_name    = $_SESSION['user_name'];
                    $email        = $_SESSION['email'];
                    $password     = $_SESSION['password '];
                    $phone_number = $_SESSION['phone_number'];
                    $image_path   = $_SESSION['img_path'];
                    
              
                    $embd_serialized = serialize($embedds);
                    
                   $query =  "INSERT INTO `users` (`name`, `email`, `password`, `phone_number`, `role`, `image_path`) 
                   VALUES ('$user_name', '$email', '$password', '$phone_number', '1', '$image_path')";
         

                    
                   $user_id = CRUD::Insert($query);

                   if($user_id != false){

                       
                        $sql = "INSERT INTO `image` (`user_id`, `vector_data`) VALUES ( '$user_id', '$embd_serialized')";
    
                       $result = CRUD::Insert($sql);
    
                       if($result != false){
                            session_destroy();
                            header("location:../Views/auth/SignUpComplete.html");
                        }else{
                            
                            header("location:SignUpOtp.php");
                        }
                        
                    }else{
                        
                        header("location:SignUpOtp.php");
                        
                   }


                }else{


                    header("location:signup.html");
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