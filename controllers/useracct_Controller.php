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
}


?>
