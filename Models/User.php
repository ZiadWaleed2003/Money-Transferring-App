<?php

require_once "Person.php";

class User extends PERSON{


    private $image_path;
    private $phone_number;


    public function __construct($id , $name , $email , $password , $image_path , $phone_number)
    {
        parent::__construct($name , $id , $email , $password);

        $this->image_path   = $image_path;
        $this->phone_number = $phone_number;
    }

    public function setImagePath($image_path){

        $this->image_path = $image_path;
    }
    
    public function setPhoneNumber($phone_number){

        $this->phone_number = $phone_number;
    }

    public function getImagePath(){
        return $this->image_path;
    }

    public function getPhoneNumber(){
        return $this->phone_number;
    }


    

    public function logOut(){

      
    }

}




?>