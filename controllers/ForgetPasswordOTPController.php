<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
};

if (isset($_POST['OTPButton'])) {
    $otp = htmlspecialchars(trim($_POST['otp']));
    $sys_otp = $_SESSION['otp'];

    if ($otp == $sys_otp) {

        header("location:../Views/auth/ChangePassword.php");
    }
}
