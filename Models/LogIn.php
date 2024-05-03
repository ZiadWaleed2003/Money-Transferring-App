<?php

require("../controllers/CRUD.php");

class Login{


    public static function sendingApiRequest($image_file , $image_name , $known_faces , $id){


        if (isset($image_file)) {
            $imageUrl = 'http://127.0.0.1:5000/compareFaces'; // Replace with your Flask endpoint URL
            
            
            $fileContent = file_get_contents($image_file); // Read the file contents
            $fileBase64 = base64_encode($fileContent);
            
            // URL of the Flask API endpoint
            $apiEndpoint = $imageUrl;
            
            // cURL request to send the image data to Flask API
            $ch = curl_init($apiEndpoint);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['file' => $fileBase64 , 'filename' => $image_name , 'known_faces' =>$known_faces , 'id' => $id]));
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            
            $data = json_decode($response, true); // Decode as associative array
            curl_close($ch);
            
            if($httpCode == 400){
        
                return false;

                
              }else{
                
                return array_values($data['response']);
                
              }
              
              
            } else {
              echo "Error: Missing image";
            }
            

    }


    public static function getUsersEmbds(){

        $query  = "SELECT `vector_data` FROM `image`";

        $result = CRUD::Select($query);

        if($result != false){

            return $result;

        }else{

            return false;
        }


    }

    public static function getUsersId(){

        $query  = "SELECT `user_id` FROM `image`";

        $result = CRUD::Select($query);

        if($result != false){

            return $result;

        }else{

            return false;
        }

    }


}
?>