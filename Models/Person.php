<?php

abstract class PERSON {


    protected $name;
    protected $id;
    protected $email;
    protected $password;


    public function __construct($name , $id , $email , $password)
    {
        $this->name     = $name;
        $this->id       = $id;
        $this->email    = $email;
        $this->password = $password;
        
    }


    abstract public function logOut() : bool;


}


?>