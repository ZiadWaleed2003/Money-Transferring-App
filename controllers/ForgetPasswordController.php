<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
;


require ("../Models/moneySystem.php");
require ("../Models/LogIn.php");


if (isset($_POST['forgetPasswordButton'])) {

    $email = htmlspecialchars(trim($_POST['email']));

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = CRUD::Select($query);

    if (!empty($result)) {


        $_SESSION['otp'] = moneySystem::SendOTP($email);


        Utilities::storeDataInSession($result[0]);

        print ($_SESSION['otp']);

        header("location:../Views/auth/ForgetPasswordOTP.php");
    } else {

        header("location:../Views/auth/forget-password.php?error=1");
    }
}
