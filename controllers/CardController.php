<?php 
require_once "CRUD.php";
require_once "DBConnection.php";

class CardController
{
    protected $db;

    public function getbanks()
    {
         
            $query="select * from bank";
            $result=CRUD::Select($query);
            if($result){
            return $result;
            }
            else{
                echo"error";
            }
         }

         public function addCard(Card $card)
     {
            $number=$card->getNumber();
            $cvv=$card->getCvv();
            $check = "SELECT * From bankcards where bankcards.number ='$number' and bankcards.cvv='$cvv' ";
            $variable=CRUD::Select($check);
            if ($variable !=false){
                $bank_id=$card->getBankId();
                $cardname=$card->getName();
                $cardnumber=$card->getNumber();
                $cardcvv=$card->getCvv();
                $cardipn=$card->getIpnCode();
                

                $query="insert into usercards(user_id,bank_id,name,number,cvv,ipn_code,balance,favourite) values ('1','$bank_id','$cardname','$cardnumber','$cardcvv','$cardipn','0000','0')";
                $result=CRUD::Insert($query);
                 return true;
            }


    }


    }
    

    
