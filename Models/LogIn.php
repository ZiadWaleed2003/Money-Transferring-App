<?php

require ("../controllers/CRUD.php");

class Login
{


    public static function sendingApiRequest($image_file, $image_name, $known_faces, $id)
    {


        if ($image_name != '') {
            $imageUrl = 'http://127.0.0.1:5000/compareFaces'; // Replace with your Flask endpoint URL


            $fileContent = file_get_contents($image_file); // Read the file contents
            $fileBase64 = base64_encode($fileContent);

            // URL of the Flask API endpoint
            $apiEndpoint = $imageUrl;

            // cURL request to send the image data to Flask API
            $ch = curl_init($apiEndpoint);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['file' => $fileBase64, 'filename' => $image_name, 'known_faces' => $known_faces, 'id' => $id]));
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            $data = json_decode($response, true); // Decode as associative array
            curl_close($ch);

            if ($httpCode == 400) {

                return false;


            } else {

                return $data['response'];

            }


        } else {
            echo "Error: Missing image";
        }


    }


    public static function getUsersEmbds()
    {

        $query = "SELECT `vector_data` FROM `image`";

        $result = CRUD::Select($query);

        if ($result != false) {

            return $result;

        } else {

            return false;
        }


    }

    public static function getUsersId()
    {

        $query = "SELECT user_id FROM image";

        $result = CRUD::Select($query);

        if ($result != false) {

            return $result;

        } else {

            return false;
        }

    }


    public static function getAllUserData($user_id)
    {

        $query = "SELECT * FROM users WHERE id = '$user_id'";
        $result = CRUD::Select($query)[0];


        if ($result != false) {

            Login::storeDataInSession($result);

            return true;

        } else {

            return false;
        }

    }


    public static function storeDataInSession($data)
    {


        if (isset($data)) {

            $_SESSION['user']['name'] = $data['name'];
            $_SESSION['user']['id'] = $data['id'];
            $_SESSION['user']['email'] = $data['email'];
            $_SESSION['user']['password'] = $data['password'];
            $_SESSION['user']['phone_number'] = $data['phone_number'];
            $_SESSION['user']['role'] = $data['role'];
            $_SESSION['user']['image_path'] = $data['image_path'];
        }
    }


    public static function logInByEmail($email, $password)
    {


        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = CRUD::Select($query);


        if (!empty($result)) {

            if ($password == $result[0]['password']) {
                echo $password;

                Login::storeDataInSession($result[0]);

                return true;

            } else {



                return false;
            }

        } else {

            return false;
        }



    }


    public static function changePassword($new_password, $id)
    {

        $query = "UPDATE users SET password='$new_password' WHERE id='$id'";

        $result = CRUD::Update($query);

        if ($result) {

            return $result;

        } else {
            return false;
        }
    }


}
?>

