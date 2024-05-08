<?php

require_once ("CRUD.php");

class BankController
{
    protected $db;


    public function addBank(bank $bank)
    {
        $name = $bank->getName();
        $id = $bank->getId();

        $check = "SELECT * FROM bank WHERE name = '$name' AND id ='$id'";

        $existingBanks = CRUD::Select($check);

        if (empty($existingBanks)) {
            $query = "INSERT INTO bank (id, name) VALUES ('$id', '$name')";

            $result = CRUD::Insert($query);

            if ($result !== false) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function viewAllbanks()
    {
        $query = "SELECT * FROM bank ORDER BY id ASC ";
        $result = CRUD::Select($query);
        if ($result) {
            return $result;
        } else {
            echo "NO BANKS TO SHOW";
            return false;
        }
    }
}
?>

