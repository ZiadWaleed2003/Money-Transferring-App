<?php

if (isset($_POST['register']))
{
    $user_name 		= trim(htmlspecialchars($_POST['username']));
	$email 			= trim(htmlspecialchars($_POST['email']));
	$phone_number	= trim(htmlspecialchars($_POST['phone']));
	$password 		= trim(htmlspecialchars($_POST['password']));

    $ipn_code       = trim(htmlspecialchars($_POST['ipn']));

    $img            = $_FILES['image'];
    
    //image processing
    
    $img_name = $img['name'];
    $img_type = $img['type'];
    $img_error = $img['error'];
    $img_tmp = $img['tmp_name'];
    $img_size = $img['size'];
    $img_ext = pathinfo($img_name,PATHINFO_EXTENSION);
    $img_newname = uniqid()."." . $img_ext;

    //move the image to the uploaded iamges folder

    move_uploaded_file($img_tmp,"../uploaded_images/$img_newname");
}

?>