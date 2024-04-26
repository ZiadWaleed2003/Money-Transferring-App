<?php
    
require_once '../../Models/bank.php';
require_once 'DBConnection.php';
require_once 'CRUD.php';


class BankController{
    protected $db;


        public function addBank(bank $bank){
            $name = $bank->getName();
            $id = $bank->getId();
            
            // Query to check if the bank with the given name and ID already exists
            $check ="SELECT * FROM bank WHERE name = '$name' AND id ='$id'";
            
            // Performing the query to check for existing banks
            $existingBanks = CRUD::Select($check);
            
            // Checking if there are no existing banks with the same name and ID
            if(empty($existingBanks)){
                // Query to insert the new bank into the database
                $query = "INSERT INTO bank (id, name) VALUES ('$id', '$name')";
                
                // Performing the query to insert the new bank
                $result = CRUD::Insert($query);
                
                // Checking if the insertion was successful
                if($result !== false){
                    return true; // Bank successfully added
                } else {
                    return false; // Bank not added due to insertion failure
                }
            } else {
                return false; // Bank not added because a bank with the same name and ID already exists
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