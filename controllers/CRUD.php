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
                    $db->closeConnection();
                    return false;
                }
                else
                {
                    
                    return $connection->insert_id;
                }

        }else{
            echo "Error : ".mysqli_error($connection);
            return false;
        }
    }

    public static function Delete($query){

        $db = new DBConnection();
        $connection = $db->openConnection();

        if($connection != FALSE){

            $result = $connection->query($query);

            if(!$result){

                echo "Error : ".mysqli_error($connection);
                $db->closeConnection();
                return false;
            }
            else{
                $db->closeConnection();
                return True;
            }
        }
        else{
                echo "Error : ".mysqli_error($connection);
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
                    $db->closeConnection();
                    return false;
                }
                else
                {
                    $db->closeConnection();
                    return $connection->insert_id;
                }

        }else{

            echo "Error : ".mysqli_error($connection);
            return false;
        }
    }


    public static function Select($query){

        $db = new DBConnection();
        $connection = $db->openConnection();

        if($connection != false){

            $result = $connection->query($query);

            if(!$result){
                
                echo "Error : ".mysqli_error($connection);
                $db->closeConnection();
                return false;
                
            }
            else{

                $db->closeConnection();
                return $result->fetch_all(MYSQLI_ASSOC);

            }
        }else{

            echo "Error : ".mysqli_error($connection);
            return false;
        }

    }

}


