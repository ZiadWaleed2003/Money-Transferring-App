<?php
require("../Models/LogIn.php");


if(isset($_POST['SignInSubmit'])){


    $email = htmlspecialchars(trim($_POST['email'])) ?? null;
    $password = $_POST['password'] ?? null;
    $img = $_FILES['image'] ?? null;
    


    if($email != ''){
        
        $result = Login::logInByEmail($email , $password);
        

        if($result){
            
            header("location: ../views/user/index.php");
            exit();

        }else{

            echo "Error 404 ";
                // handle the wrong credentials
        }


    

    }else if (isset($img) and $email == ''){


        $image_file = $img['tmp_name'];
        $image_name = $img['name'];

        $id = Login::getUsersId(); 
        $known_faces = Login::getUsersEmbds();

        $unserialized_faces = [];
        $ids = [];

        


        for($i = 0 ; $i  < count($id) ; $i++){
 
            array_push($ids , $id[$i]['user_id']);
             
        }

        
        



       for($i = 0 ; $i  < count($known_faces) ; $i++){

            $x = unserialize($known_faces[$i]['vector_data']);
          
            $unserialized_faces [] = $x;
        }


        

    
        

        $response = LogIn::sendingApiRequest($image_file , $image_name , $unserialized_faces , $id);

        // echo $response[0];


        if($response[0] != "Unknown"){



            Login::getAllUserData($response[0]);
            
            if($_SESSION['user']['password'] == $password){
                
                header("location:../Views/user");
                
            }else{
                
                // handle the wrong credentials
            }
            
            
        }else{

            echo "<h1> A7aaa neeeek </h1>";
        }



    }
}



?>