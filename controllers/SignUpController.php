<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
};
session_destroy();

require("../Models/SignUp.php");
require("../Models/moneySystem.php");

if (isset($_POST['submit'])) {

  $_SESSION['user_name']     = trim(htmlspecialchars($_POST['username'])) ?? null;
  $_SESSION['email']         = trim(htmlspecialchars($_POST['email'])) ?? null;
  $_SESSION['phone_number']  = trim(htmlspecialchars($_POST['phone'])) ?? null;
  $_SESSION['password ']    = password_hash($_POST['password'], PASSWORD_DEFAULT) ?? null;



  $img          = $_FILES['image'];

  $imageFile    = $img["tmp_name"];
  $imagename    = $img['name'];

  if (isset($imageFile) && $imageFile) {

    $_SESSION['img_path']  = Signup::saveUserImage($img);
  }

  $_SESSION['otp'] = moneySystem::SendOTP($_SESSION['email']);
}
