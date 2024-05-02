<?php
session_start();

require("../Models/SignUp.php");

if (isset($_POST['submit']))
{
    $user_name 		= trim(htmlspecialchars($_POST['username']));
	  $email 			  = trim(htmlspecialchars($_POST['email']));
	  $phone_number	= trim(htmlspecialchars($_POST['phone']));
	  $password 		= trim(htmlspecialchars($_POST['password']));

    $ipn_code     = trim(htmlspecialchars($_POST['ipn']));

    $img          = $_FILES['image'];
 
    $imageFile    = $img["tmp_name"];
    $imagename    = $img['name'];
    
    if (isset($imageFile)) {



      // send and verify the otp first !

        


      ###############

      // sending the image to the model to get the vector embeddings

      Signup::sendingApiRequest($imageFile , $imagename);


      //Saving the image of the user to use it as a PP

      Signup::saveUserImage($img);  
    
      
      
    }



}
?>