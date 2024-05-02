<?php
session_start();

require("../Models/SignUp.php");
require("../Models/moneySystem.php");

if (isset($_POST['submit']))
{
    $_SESSION['user_name'] 		= trim(htmlspecialchars($_POST['username']));
	  $_SESSION['email'] 			  = trim(htmlspecialchars($_POST['email']));
	  $_SESSION['phone_number']	= trim(htmlspecialchars($_POST['phone']));
	  $_SESSION['password ']		= trim(htmlspecialchars($_POST['password']));
    $_SESSION['ipn_code']     = trim(htmlspecialchars($_POST['ipn']));

    $img          = $_FILES['image'];
 
    $imageFile    = $img["tmp_name"];
    $imagename    = $img['name'];

    
    if (isset($imageFile)) {



      // send and verify the otp first !

        $_SESSION['otp'] = moneySystem::SendOTP($_SESSION['email']);
        

        ###############

         $_SESSION['img_path']  = Signup::saveUserImage($img);  

        // sending the image to the model to get the vector embeddings

          header("location:../Views/auth/SignUpOtp.php");

          // Signup::sendingApiRequest($imageFile , $imagename);


        //Saving the image of the user to use it as a PP
      
    }



}
?>