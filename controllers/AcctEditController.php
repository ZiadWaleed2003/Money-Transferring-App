<?php require_once $_SERVER['DOCUMENT_ROOT'] . ("/models/User.php") ?>

<?php
$active_user_id = 706; #TODO: replace with user id from sessions
$user = User::constructFromDB($active_user_id);
?>

<?php
$upl_dir = $_SERVER['DOCUMENT_ROOT'] . "/views/assets/img/";
$file_path = $upl_dir . basename($_FILES["profile_img"]["name"]);
$file_type = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
$trgt = $user->getId() . "-img.";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = empty($_POST["profile_email"]) ? $user->getEmail() : clean_input($_POST["profile_email"]);
    $password = empty($_POST["profile_pass"]) ? $user->getPassword() : clean_input($_POST["profile_pass"]);
    $img_path = !isset($_FILES["profile_img"]) ? $user->getImagePath() : test_file($file_type, $upl_dir, $trgt);
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

function test_file($file_type, $upl_dir, $trgt)
{
    $final = $upl_dir . $trgt . $file_type;
    $uploadOk = 1;
    $check = getimagesize($_FILES["profile_img"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
    if (
        $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
        && $file_type != "gif"
    ) {
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
    } else {
        $file_pattern = $upl_dir . $trgt . "*";
        array_map("unlink", glob($file_pattern));
        if (move_uploaded_file($_FILES["profile_img"]["tmp_name"], $final)) {
            return "/views/assets/img/" . $trgt . $file_type;
        } else {
            echo "Upload Error Occured";
        }
    }
}
?>

