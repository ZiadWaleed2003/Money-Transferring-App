<?php

require_once "Person.php";
?>
<?php
$exp = "~[a-zA-Z]*Controller~";
if (preg_match($exp, pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME))) {
    require_once "CRUD.php";
} else {
    require_once "../../controllers/CRUD.php";
}

class User extends PERSON
{


    private $image_path;
    private $phone_number;


    public function __construct($id, $name, $email, $password, $image_path, $phone_number)
    {
        parent::__construct($name, $id, $email, $password);

        $this->image_path = $image_path;
        $this->phone_number = $phone_number;
    }

    public static function constructFromDB($id)
    {
        $query = "SELECT * FROM users WHERE id = '$id'";
        $res = CRUD::Select($query)[0];
        return new User($id, $res["name"], $res["email"], $res["password"], $res["image_path"], $res["phone_number"]);
    }

    public static function quickLookUp($id)
    {
        $query = "SELECT name FROM users WHERE id = '$id'";
        $res = CRUD::Select($query)[0];
        return $res;
    }

    public function writeToDB()
    {
        $query = "UPDATE users SET name = '$this->name', email = '$this->email', password = '$this->password', image_path =
'$this->image_path', phone_number = '$this->phone_number' WHERE id = '$this->id'";
        CRUD::Update($query);
    }

    public function getTranscationHistory()
    {
        $query = "SELECT id, sender_id, reciever_id, date, status, description, amount FROM moneyapp.transactions WHERE
(description='Receiving Money Transaction' OR description='Sending Money Transaction') AND (sender_id = '$this->id' OR
reciever_id = '$this->id');";
        $res = CRUD::Select($query);
        if (empty($res)) {
            return 0;
        } else {
            return $res;
        }
    }
    public function getBillHistory()
    {
        $query = "SELECT id, sender_id, reciever_id, date, status, description, amount FROM moneyapp.transactions WHERE
description='Bill' AND (sender_id = '$this->id' OR reciever_id = '$this->id');";

        $res = CRUD::Select($query);
        if (empty($res)) {
            return 0;
        } else {
            return $res;
        }
    }
    public function getDonationHistory()
    {
        $query = "SELECT id, sender_id, reciever_id, date, status, description, amount FROM moneyapp.transactions WHERE
description='Donation' AND (sender_id = '$this->id' OR reciever_id = '$this->id');";

        $res = CRUD::Select($query);
        if (empty($res)) {
            return 0;
        } else {
            return $res;
        }
    }

    public function deleteAccount()
    {
        $query = "DELETE FROM moneyapp.users WHERE id ='$this->id';";
        CRUD::Delete($query);
    }

    public function uploadPicture($file)
    {
        $upl_dir = "../views/assets/img/";
        $file_path = $upl_dir . basename($file["name"]);
        $file_type = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
        $trgt = $this->id . "-img.";
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

    public function reloadUserSession()
    {
        $_SESSION['user']['name'] = $this->name;
        $_SESSION['user']['id'] = $this->id;
        $_SESSION['user']['email'] = $this->email;
        $_SESSION['user']['password'] = $this->password;
        $_SESSION['user']['phone_number'] = $this->phone_number;
        $_SESSION['user']['image_path'] = $this->image_path;
    }

    public function setImagePath($image_path)
    {

        $this->image_path = $image_path;
    }

    public function setPhoneNumber($phone_number)
    {

        $this->phone_number = $phone_number;
    }

    public function getImagePath()
    {
        return $this->image_path;
    }

    public function getPhoneNumber()
    {
        return $this->phone_number;
    }




    public function logOut()
    {
    }
}




?>

