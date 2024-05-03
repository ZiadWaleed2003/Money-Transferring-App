<?php
require("../Models/LogIn.php");

if(isset($_POST['SignInSubmit'])){


    $email = htmlspecialchars(trim($_POST['email']));
    $password = sha1(htmlspecialchars(trim($_POST['password'])));
    $img = $_FILES['image'];
    


    if(isset($email)){
        
        $result = Login::logInByEmail($email , $password);
        
        
        if($result){
            
            header("location:../Views/user");

        }else{

            echo "Error 404 ";
                // handle the wrong credentials
        }


    

    }elseif (isset($img) and (isset($email) == null)){


        $image_file = $img['tmp_name'];
        $image_name = $img['name'];

        $id = Login::getUsersId(); 
        $known_faces = Login::getUsersEmbds();

        print_r( $known_faces);


        // $response = LogIn::sendingApiRequest($image_file , $image_name , $known_faces , $id);


        // if($response != "Unkown"){


        //     Login::getAllUserData($response);
            
        //     if($_SESSION['user']['password'] == $password){
                
        //         header("location:../Views/user");
                
        //     }else{
                
        //         // handle the wrong credentials
        //     }
            
            
    }



}



?>