<?php

abstract class PERSON
{


    protected $name;
    protected $id;
    protected $email;
    protected $password;


    public function __construct($name, $id, $email, $password)
    {
        $this->name = $name;
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;

    }

    public function getName()
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }


    public function setName($name)
    {

        $this->name = $name;
    }

    public function setId($id)
    {

        $this->id = $id;
    }

    public function setEmail($email)
    {

        $this->email = $email;
    }

    public function setPassword($password)
    {

        $this->password = $password;
    }




    abstract public function logOut();


}


?>

