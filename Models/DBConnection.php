<?php 

class DBConnection
{
    private const DB_HOST = 'localhost';
    private const DB_USER = 'root';
    private const DB_PASSWORD = '';
    private const DB_NAME = 'moneyapp';
    public $connection;  


    public function __construct(){

    }

    public function openConnection() {
        $this->connection = new mysqli(
            self::DB_HOST,
            self::DB_USER,
            self::DB_PASSWORD,
            self::DB_NAME
        );

        if ($this->connection->connect_error) {
            echo "Connection Error: " . $this->connection->connect_error;
            return false;
        }

        return $connection;  
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