<?php 

class DBController
{
    const db_host = 'localhost';
    const db_user = 'root';
    const db_password = '';
    const db_name = 'moneyapp';


    public static function openconnection(){
        $connection= new mysqli(dbHost,dbUser,dbPassword,dbName);

        if($connection->connect_error){
            echo "Connection Error : ".$connection->connect_error;
            return false;
        }
        
        return $connection;
    }


    public function closeconnection(){
        if($this->connection){
            $this->connection.close();
        }
        else{
            echo "Connection not open";
        }
    }


    public function select($qry){
        $result=$this->connection->query($qry);
        if(!$result){
            echo "Error".mysqli_error($this->connection);
            return false;
        }
        else{
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }

}