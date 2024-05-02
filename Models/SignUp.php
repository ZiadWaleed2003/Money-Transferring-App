<?php

session_start();

class Signup{


    public static function sendingApiRequest($image_file ,$image_name){


        if (isset($image_file)) {
            $imageUrl = 'http://127.0.0.1:5000/getFaceEmbeddings'; // Replace with your Flask endpoint URL
            
            
            $fileContent = file_get_contents($image_file); // Read the file contents
            $fileBase64 = base64_encode($fileContent);
            
            // URL of the Flask API endpoint
            $apiEndpoint = $imageUrl;
            
            // cURL request to send the image data to Flask API
            $ch = curl_init($apiEndpoint);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['file' => $fileBase64 , 'filename' => $image_name]));
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


    public static function saveUserImage($img){


          $img_name = $img['name'];
          $img_type = $img['type'];
          $img_error = $img['error'];
          $img_tmp = $img['tmp_name'];
          $img_size = $img['size'];
          $img_ext = pathinfo($img_name,PATHINFO_EXTENSION);
          $img_newname = uniqid()."." . $img_ext;
    
          // move the image to the uploaded iamges folder
    
          move_uploaded_file($img_tmp,"../uploaded_images/$img_newname");

          return "../uploaded_images/$img_newname";
    }



}



?>