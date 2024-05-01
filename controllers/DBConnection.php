<?php 

class DBConnection
{
    private  $DB_HOST;
    private  $DB_USER ;
    private  $DB_PASSWORD ;
    private  $DB_NAME;
    public $connection;  


    public function __construct(){

        $this->DB_HOST = 'localhost' ;
        $this->DB_USER = 'root' ;
        $this->DB_PASSWORD = '' ;
        $this->DB_NAME = 'moneyapp' ;
        
    }

    public function openConnection() {
        $this->connection = new mysqli(
            $this->DB_HOST,
            $this->DB_USER,
            $this->DB_PASSWORD,
            $this->DB_NAME
        );

        if ($this->connection->connect_error) {
            echo "Connection Error: " . $this->connection->connect_error;
            return false;
        }

        return $this->connection;  
    }

    public function closeConnection(){
        if($this->connection){
            $this->connection->close();
        }
        else{
            echo "Connection not open";
        }
    }


}