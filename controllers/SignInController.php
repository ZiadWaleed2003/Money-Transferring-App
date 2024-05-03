<?php
require("../Models/LogIn.php");

if(isset($_POST['SignInSubmit'])){


    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));



    if(isset($_FILES['image'])){

        $img = $_FILES['image'];

        $image = $img['tmp_name'];
        $image_name = $img['name'];

        


    }else{



    }



}





?>