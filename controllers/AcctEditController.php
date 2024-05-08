<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
;
require_once "../models/User.php" ?>

<?php
$active_user_id = $_SESSION['user']['id'];  #TODO: replace with user id from sessions
$user = User::constructFromDB($active_user_id);
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["profile_email"])) {
        $email = clean_input($_POST["profile_email"]);
        $user->setEmail($email);
    }
    if (!empty($_POST["profile_pass"])) {
        $password = password_hash($_POST['profile_pass'], PASSWORD_DEFAULT);
        $user->setPassword($password);
    }
    if (!empty($_FILES["profile_img"]["tmp_name"])) {
        $img_path = $user->uploadPicture($_FILES["profile_img"]);
        $user->setImagePath($img_path);
    }
    $user->writeToDB();
    $user->reloadUserSession();
    header("Location: ../views/user/user-acct-view.php");
    die();
}

function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>

