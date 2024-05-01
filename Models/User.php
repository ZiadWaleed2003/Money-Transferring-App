<?php

require_once "Person.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/CRUD.php";

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
        $query = "UPDATE users SET name = '$this->name', email = '$this->email', password = '$this->password', image_path = '$this->image_path', phone_number = '$this->phone_number' WHERE id = '$this->id'";
        CRUD::Update($query);
    }

    public function getTranscationHistory()
    {
        $query = "SELECT * FROM moneyapp.transactions WHERE (description='Receiving Money Transaction' OR description='Sending Money Transaction') AND (sender_id = '$this->id' OR reciever_id = '$this->id');";
        $res = CRUD::Select($query);
        if (empty($res)) {
            return 0;
        } else {
            return $res;
        }
    }
    public function getBillHistory()
    {
        $query = "SELECT * FROM moneyapp.transactions WHERE description='Bill' AND (sender_id = '$this->id' OR reciever_id = '$this->id');";

        $res = CRUD::Select($query);
        if (empty($res)) {
            return 0;
        } else {
            return $res;
        }
    }
    public function getDonationHistory()
    {
        $query = "SELECT * FROM moneyapp.transactions WHERE description='Donation' AND (sender_id = '$this->id' OR reciever_id = '$this->id');";
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

