<?php
session_start();

if(isset($_POST['OTPButton'])){


    $otp = htmlspecialchars(trim($_POST['otp']));
    $sys_otp = $_SESSION['otp'];

     print( $sys_otp == ""?1:2);

    if($otp ==$sys_otp){

        header("location:../Views/auth/ChangePassword.php");
    }
}

?>