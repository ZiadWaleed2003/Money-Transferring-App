<?php
require_once("DBConnection.php");
class CRUD{

    public static function Insert($query){
            
        $db = new DBConnection();
        $connection = $db->openConnection();

        if ($connection != FALSE){

            $result = $connection->query($query);
               
             if(!$result)
                {
                    echo "Error : ".mysqli_error($connection);
                    return false;
                }
                else
                {
                    return $connection->insert_id;
                }

        }
    }

    public static function Delete($query){

        $db = new DBConnection();
        $connection = $db->openConnection();

        if($connection != FALSE){

            $result = $connection->query($query);

            if(!$result){

                echo "Error : ".mysqli_error($connection);
                return false;
            }
            else{
                return True;
            }
        }
        else{
                return false;
        }


    }

    public static function Update($query){
            
        $db = new DBConnection();
        $connection = $db->openConnection();

        if ($connection != FALSE){

            $result = $connection->query($query);
               
             if(!$result)
                {
                    echo "Error : ".mysqli_error($connection);
                    return false;
                }
                else
                {
                    return $connection->insert_id;
                }

        }
    }


    public static function Select($query){

        $db = new DBConnection();
        $connection = $db->openConnection();

        if($connection != false){

            $result = $connection->query($query);

            if(!$result){
                
                echo "Error : ".mysqli_error($connection);
                return false;
                
            }
            else{

                return $result->fetch_all(MYSQLI_ASSOC);

            }
        }

    }

}


?>