<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
;
require ("../Models/LogIn.php");

if (isset($_POST['NewPasswordButton'])) {

    $new_pass = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    $result = Utilities::changePassword($new_pass, $_SESSION['user']['id']);

    if ($result) {

        $_SESSION['user']['password'] = $new_pass;

        header("location:../Views/user");
    } else {

        header("location:../Views/auth/ChangePassword.php?error=1");
    }
}
