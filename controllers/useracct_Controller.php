<?php
require_once ("CRUD.php");



class useracct_Controller{
    public function viewAllusers(){
        $query = "select * from users";
        $result = CRUD::Select($query);
        if($result){
            return $result;
        }
        else{
            echo "NO USERS TO SHOW";
            return false;
        }
    }


    public function feedback($feedback){
       $query="insert into feedback(user_id,description) values (".$_SESSION["user"]["id"].",'$feedback') ";
       $result=CRUD::Update($query);
       if($result !=false){
        return true;
       }
       else{
        return false;
       }
    }
}


?>
