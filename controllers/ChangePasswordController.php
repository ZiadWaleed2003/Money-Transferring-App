<?php
require("../Models/LogIn.php");

if(isset($_POST['NewPasswordButton'])){

    $new_pass = htmlspecialchars(trim($_POST['new_password']));

    $result   = Login::changePassword($new_pass , $_SESSION['user']['id']);

    if($result){

        $_SESSION['user']['password'] = $new_pass;

        header("location:../Views/user");
    
    }else{

        header("location:../Views/auth/ChangePassword.php?error=1");
    }


}

?>