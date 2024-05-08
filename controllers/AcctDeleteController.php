<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
} ?>
<?php require_once "../models/User.php";
$active_user_id = $_SESSION['user']['id'];  #TODO: replace with user id from sessions
$user = User::constructFromDB($active_user_id);
$user->deleteAccount();
header("location:../views/user/deleted-acct.php")
    ?>

