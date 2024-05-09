<?php
require_once ("DBConnection.php");
class CRUD
{

    public static function Insert($query)
    {

        $db = new DBConnection();
        $connection = $db->openConnection();

        if ($connection != FALSE) {

            try{
                            $result = $connection->query($query);

                            if (!$result) {
                                echo "Error : " . mysqli_error($connection);
                                $db->closeConnection();
                                throw new Exception("Insertion Error");

                            } else {

                                return $connection->insert_id;
                            }
            
            
            }catch(Exception $e){

                $e->getMessage();
                return false;
            }

            

        } else {
            echo "Error : " ;

            return false;
        }
    }

    public static function Delete($query)
    {

        $db = new DBConnection();
        $connection = $db->openConnection();

        if ($connection != FALSE) {

            $result = $connection->query($query);

            if (!$result) {

                echo "Error : " . mysqli_error($connection);
                $db->closeConnection();
                return false;
            } else {
                $db->closeConnection();
                return True;
            }

        } else {
            echo "Error : " ;
            return false;

        }


    }

    public static function Update($query)
    {

        $db = new DBConnection();
        $connection = $db->openConnection();

        if ($connection != FALSE) {

            $result = $connection->query($query);


            if (!$result) {
                echo "Error : " . mysqli_error($connection);
                $db->closeConnection();
                return false;
            } else {
                $db->closeConnection();
                return true;
            }

        } else {

            echo "Error : " ;

            return false;
        }
    }


    public static function Select($query)
    {

        $db = new DBConnection();
        $connection = $db->openConnection();

        if ($connection != false) {

            $result = $connection->query($query);

            if (!$result) {

                echo "Error : " . mysqli_error($connection);
                $db->closeConnection();
                return false;

            } else {

                return $result->fetch_all(MYSQLI_ASSOC);
                $db->closeConnection();

            }
        } else {


            echo "Error : ";

            return false;
        }

    }

}


