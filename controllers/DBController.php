<?php 

class DBController
{
    public $dbHost="localhost";
    public $dbUser="root";
    public $dbPassword="";
    public $dbName="moneyapp";
    public $connection;

    public function openconnection(){
        $this->connection= new mysqli($this->dbHost,$this->dbUser,$this->dbPassword,$this->dbName);
        if($this->connection->connect_error){
            echo "Connection Error : ".$this->connection->connect_error;
            return false;
        }
        else{
            return true;
        }
    }

    
    public function closeconnection(){
        if($this->connection){
            $this->connection.close();
        }
        else{
            echo "Connection not open";
        }
    }


}