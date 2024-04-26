<?php
    
require_once '../../Models/bank.php';
require_once 'DBConnection.php';
require_once 'CRUD.php';


class BankController{
    protected $db;


        public function addBank(bank $bank){
            $name = $bank->getName();
            $id = $bank->getId();
            
            $check ="SELECT * FROM bank WHERE name = '$name' AND id ='$id'";
            
            $existingBanks = CRUD::Select($check);
            
            if(empty($existingBanks)){
                $query = "INSERT INTO bank (id, name) VALUES ('$id', '$name')";
                
                $result = CRUD::Insert($query);
                
                if($result !== false){
                    return true; 
                } else {
                    return false;
                }
            } else {
                return false; 
            }
        }
        

    public function viewAllbanks(){
        $query = "select * from bank";
        $result = CRUD::Select($query);
        if($result){
            return $result;
        }
        else{
            echo"ERROR IN CONNECTION";
        }
    }
}
?>