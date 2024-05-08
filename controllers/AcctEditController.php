<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
;
require_once "../models/User.php";
require_once "../models/SignUp.php" ?>

<?php
$active_user_id = $_SESSION['user']['id'];  #TODO: replace with user id from sessions
$user = User::constructFromDB($active_user_id);
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = empty($_POST["profile_email"]) ? $user->getEmail() : clean_input($_POST["profile_email"]);
    $password = empty($_POST["profile_pass"]) ? $user->getPassword() : password_hash($_POST['profile_pass'], PASSWORD_DEFAULT);
    $img_path = empty($_FILES["profile_img"]["tmp_name"]) ? $user->getImagePath() : $user->uploadPicture($_FILES["profile_img"]);
    if (!empty($_FILES["face_img"]["tmp_name"])) {
        $face_file = $_FILES["face_img"];
        $face_path = Signup::saveUserImage($face_file);
        $fileInfo = pathinfo($face_path);
        $filename = $fileInfo['basename'];
        $embedds = Signup::sendingApiRequest($face_path, $filename);
        $embd_serialized = serialize($embedds);
        $sql = "INSERT INTO `image` (`user_id`, `vector_data`) VALUES ( '$user_id', '$embd_serialized')";
        $result = CRUD::Insert($sql);
    }
    $user->setEmail($email);
    $user->setPassword($password);
    $user->setImagePath($img_path);
    $user->writeToDB();
    $user->reloadUserSession();
    header("Location: /views/user/user-acct-view.php");
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

