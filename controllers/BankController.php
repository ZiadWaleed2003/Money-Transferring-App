<?php
    
require_once '../Models/bank.php';
require_once '../Models/DBConnection.php';

class BankController{
    public function addBank(bank $bank){
        $this->db= new DBConnection;
        if($this->db->openconnection){
            $check = "SELECT * FROM bank where [name]= '$bank->name' and [id]='$bank->id'";
            $var=$this->db->select($check);
            if(mysqli_num_rows($var)>0){
                $query = "insert into bank values ('','$bank->name','$bank->id')";
                return $this->db->insert($query);
            }   
        }
    else{
    echo "Error in connection";
    return false;
    }
}

    public function viewAllbanks(){
        $this->db = new DBConnection;
        if($this->db->openconnection){
            $query="select *from bank";
            $this->db->select($query);
        }
        else{
            echo"ERROR IN CONNECTION";
            return false;
        }
    }
}
?>