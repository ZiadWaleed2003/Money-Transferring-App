<?php
session_start();


require ("../Models/SignUp.php");
require ("CRUD.php");

if (isset($_POST['OtpSubmit'])) {

    $otp = trim(htmlspecialchars($_POST['otp']));


    if (isset($otp)) {

        $sys_otp = $_SESSION['otp'];

        if ($sys_otp != false) {

            if ($sys_otp == $otp) {

                // ToDo : continue the validation of the data and inserting it to the DB

                $user_name    = $_SESSION['user_name'];
                $email        = $_SESSION['email'];
                $password     = $_SESSION['password '];
                $phone_number = $_SESSION['phone_number'];
                
                $database_selected_colums = "`name`, `email`, `password`, `phone_number`, `role`";
                $database_selected_colums_values = "'$user_name', '$email', '$password', '$phone_number', '0'";
                
                
                if (isset($_SESSION['img_path']) && $_SESSION['img_path']) {

                    $fileInfo = pathinfo($_SESSION['img_path']);
                    $filename = $fileInfo['basename'];
                    
                    $embedds = Signup::sendingApiRequest($_SESSION['img_path'], $filename);
                    $embd_serialized = serialize($embedds);
                    
                    // add image path to database New User insertion query
                    $database_selected_colums .= ", `image_path`";
                    $database_selected_colums_values .= ", '$image_path'";

                }

                $query =  "INSERT INTO `users` ($database_selected_colums) VALUES ($database_selected_colums_values)";
                var_dump($query);

                $user_id = CRUD::Insert($query);

                if ($user_id != false) {

                    $result = true;
                    if(isset($_SESSION['img_path']) && $_SESSION['img_path']){
                        var_dump("checked");
                        exit();

                        $sql = "INSERT INTO `image` (`user_id`, `vector_data`) VALUES ( '$user_id', '$embd_serialized')";
                        $result = CRUD::Insert($sql);
                    }

                    if ($result != false) {
                        session_destroy();
                        header("location:../Views/auth/SignUpComplete.html");
                    } else {

                        header("location:SignUpOtp.php");
                    }
                } else {

                    header("location:SignUpOtp.php");
                }


            } else {

                unlink($_SESSION['img_path']);
            }
        } else {

            unlink($_SESSION['img_path']);
        }
    }
}
