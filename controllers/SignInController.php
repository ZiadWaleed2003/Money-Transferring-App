<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
};
require("../Models/LogIn.php");

if (isset($_POST['SignInSubmit'])) {


    $email = htmlspecialchars(trim($_POST['email'])) ?? null;
    $password = $_POST['password'] ?? null;
    $img = $_FILES['image'] ?? null;

    $_SESSION['error_message'];


    if ($email != '') {

        $emailPasswordLogin = new logInByEmail();
        $loginWithEmailPassword = new Login($emailPasswordLogin);

        $credentials = ['email' => $email, 'password' => $password];
        $result = $loginWithEmailPassword->logInUser($credentials);


        if ($result) {

            header("location: ../views/user/index.php");
            exit();
        } else {


            header("location:../Views/auth/signin.php?error=1");
        }
    } else if (isset($img) and $email == '') {


        $image_file = $img['tmp_name'];
        $image_name = $img['name'];

        $extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

        $allowedExtensions = array('jpg', 'jpeg', 'png');

        if (!in_array($extension, $allowedExtensions)) {

            header("location:../Views/auth/signin.php?error=1");
        }


        $id = Utilities::getUsersId();
        $known_faces = Utilities::getUsersEmbds();

        $unserialized_faces = [];
        $ids = [];



        for ($i = 0; $i < count($known_faces); $i++) {

            $x = unserialize($known_faces[$i]['vector_data']);

            $unserialized_faces[] = $x;
        }



        $faceImagePasswordLogin = new LogInByFace();
        $loginWithFaceImagePassword = new Login($faceImagePasswordLogin);


        $credentials = ['image_file' => $image_file, 'image_name' => $image_name, 'known_faces' => $unserialized_faces, 'id' => $id];

        $response = $loginWithFaceImagePassword->logInUser($credentials);




        if ($response[0] != "Unknown") {



            Utilities::getAllUserData($response[0]);

            if (password_verify($password , $_SESSION['user']['password'])) {

                if($_SESSION['user']['role'] == 1){

                    header("location:../Views/admin");

                }else if($_SESSION['user']['role'] == 0){

                    header("location:../Views/user");
                }
                    
                

            } else {



                header("location:../Views/auth/signin.php?error=1");
            }
        } else {

            header("location:../Views/auth/signin.php?error=1");
        }
    }
}
