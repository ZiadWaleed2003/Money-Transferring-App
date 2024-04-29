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

    public function writeToDB()
    {
        $query = "UPDATE users SET name = '$this->name', email = '$this->email', password = '$this->password', image_path = '$this->image_path', phone_number = '$this->phone_number' WHERE id = '$this->id'";
        CRUD::Update($query);
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

