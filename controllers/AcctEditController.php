<?php require_once $_SERVER['DOCUMENT_ROOT'] . ("/models/User.php") ?>

<?php
$active_user_id = 101; #TODO: replace with user id from sessions
$user = User::constructFromDB($active_user_id);
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = empty($_POST["profile_email"]) ? $user->getEmail() : clean_input($_POST["profile_email"]);
    $password = empty($_POST["profile_pass"]) ? $user->getPassword() : clean_input($_POST["profile_pass"]);
    $img_path = !isset($_FILES["profile_img"]) ? $user->getImagePath() : $user->uploadPicture($_FILES["profile_img"]);
    $user->setEmail($email);
    $user->setPassword($password);
    $user->setImagePath($img_path);
    $user->writeToDB();
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

