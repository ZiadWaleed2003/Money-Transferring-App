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
            $bank_id=$card->getBankId();
            $number=$card->getNumber();
            $cvv=$card->getCvv();
            $check = "SELECT * From bankcards where bankcards.number ='$number' and bankcards.bank_id='$bank_id' and bankcards.cvv='$cvv' and bankcards.user_mobile_number='".$_SESSION['user']['phone_number']."' ";
            $variable=CRUD::Select($check);  
            if ($variable !=false){ 
                $query2="SELECT * From usercards where usercards.number ='$number' and usercards.user_id=".$_SESSION["user"]["id"]." and usercards.bank_id='$bank_id' ";
                $result2=CRUD::Select($query2);
                if(!count($result2)){
                $cardname=$card->getName();
                $cardnumber=$card->getNumber();
                $cardcvv=$card->getCvv();
                $cardipn=$card->getIpnCode();
                $cardbalance=$variable[0]['balance'];          
                $query="insert into usercards(user_id,bank_id,name,number,cvv,ipn_code,balance,favourite) values ('".$_SESSION["user"]["id"]."','$bank_id','$cardname','$cardnumber','$cardcvv','$cardipn','$cardbalance','0')";
                $result=CRUD::Insert($query);
                $_SESSION['success_message']="Card Added Successfully";
                 return true;
                }
                else
                {
                    $_SESSION['error_message']="Card Added Before";
                    return false;

                }
            }
            else{
                $_SESSION['error_message']="Card Not Found";
                return false;
            }
            


    }
    public function getAllCards(){
        $query="select usercards.id,bank.name as 'bank',usercards.name,usercards.number,favourite from usercards,bank where usercards.bank_id=bank.id AND usercards.user_id=".$_SESSION["user"]["id"]."";
            $result=CRUD::Select($query);
            if($result){
            return $result;
            }
            else{
                return false;
            }
    }


    public function deleteCard($id)
    {

       $query="delete from usercards where id=$id";
       $result=CRUD::Delete($query);
       if($result !=false){
        return true;
       }
       else{
        return false;
       }
        
   }

   public function updateCard($name,$id)
    {
       $query="update usercards SET name='$name' where usercards.id=$id";
       $result=CRUD::Update($query);
       if($result !=false){
        return true;
       }
       else{
        return false;
       }
        
   }

   public function favCard($id)
    {
       $query="update usercards SET usercards.favourite=1 where usercards.id=$id";
       $result=CRUD::Update($query);
       if($result !=false){
        return true;
       }
       else{
        return false;
       }
        
   }

   public function UndofavCard($id)
    {
       $query="update usercards SET usercards.favourite=0 where usercards.id=$id";
       $result=CRUD::Update($query);
       if($result !=false){
        return true;
       }
       else{
        return false;
       }
        
   }

   public function getAllfavCards(){
    $query="SELECT usercards.id, bank.name AS 'bank', usercards.name, usercards.number
    FROM usercards
    INNER JOIN bank ON usercards.bank_id = bank.id
    WHERE usercards.favourite = 1
    AND usercards.user_id =".$_SESSION["user"]["id"]."
     ";
        $result=CRUD::Select($query);
        if($result){
        return $result;
        }
        else{

            return false;
        }
}


}

    

    
