<?php
session_start();

require_once('DBConnection.php');
require_once('../Models/Transaction.php');

class TransactionsController
{

    public function startTransaction($transaction_type)
    {
        
        $check_Transaction_start = new Transaction();
        
        try
        {
            
            if($transaction_type === 'send')
            {
                
                $sql = "SELECT `number` FROM usercards WHERE user_id = ".$_SESSION['user']['id'];

                $check_Transaction_start->setSenderCardNumber(CRUD::Select($sql)[0]['number'] ?? null);
                $check_Transaction_start->setReceiverCardNumber($_POST['transaction_receiver_card_number'] ?? null);
                $check_Transaction_start->setAmount($_POST['transaction_amount'] ?? null);

                $check_Transaction_start->checkTransactionStart('send');
                $transaction_start = true;
            }
        }
        catch(Exception $e)
        {

            $_SESSION['transaction']['error_message'] = $e->getMessage();
            $transaction_start = false;
        }


        if($transaction_start)
        {
            $_SESSION['transaction']['sender_card_number'] = $check_Transaction_start->getSenderCardNumber();
            $_SESSION['transaction']['receiver_card_number'] = $check_Transaction_start->getReceiverCardNumber();
            $_SESSION['transaction']['amount'] = $check_Transaction_start->getAmount();
            $_SESSION['transaction']['check_time_start'] = time() + 60;
            $_SESSION['transaction']['type'] = 'send';

            header('location: ../views/user/ipn.php');
            exit();
        }
        else{
            header('location: ../views/user/send-money.php');
            exit();
        }

    }


    public function sendTransaction()
    {
        $transaction = new Transaction();

        $transaction->setSenderCardNumber($_SESSION['transaction']['sender_card_number']) ?? null;
        $transaction->setReceiverCardNumber($_SESSION['transaction']['receiver_card_number']) ?? null;
        $transaction->setAmount($_SESSION['transaction']['amount']) ?? null;
        $transaction->setIpn(array($_POST['transaction_ipn_1'] ?? null, $_POST['transaction_ipn_2'] ?? null, 
                                   $_POST['transaction_ipn_3'] ?? null, $_POST['transaction_ipn_4'] ?? null, 
                                   $_POST['transaction_ipn_5'] ?? null, $_POST['transaction_ipn_6'] ?? null, ));
        $transaction->setStatus(1);


        try{

            $transaction_id = $transaction->sendMoney($_SESSION['transaction']['check_time_start']);
            // $transaction_status = true;
        }
        catch (Exception $e)
        {

            $_SESSION['transaction']['error_message'] = $e->getMessage();
            // $transaction_status = false;
        }
        finally{

            $_SESSION['transaction']['id'] = $transaction_id ?? "??????????";
    
            header('location: ../views/user/view_transactions_status.php');
            exit();
        }

    }
    public function checkBalance()
    {
        try{
            session_start();

                $sql = "SELECT `number` FROM usercards WHERE id = ".$_POST["sender_card_number"];

            $transaction=new Transaction();
            $transaction->setSenderCardNumber(CRUD::Select($sql)[0]['number'] ?? null);
    
            $senderAmount=$transaction->checkBalance();
        
            
            echo "<script>alert('$senderAmount')</script>";
            if (isset($senderAmount))
            {

                $_SESSION["transaction"]["check_balance"]=$senderAmount;
                header('location: ../views/user/balanceshow.php');
            exit();

            }

        }catch(Exception $e)
        {
            throw $e;
        }

    }
  
}

?>

<?php

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        $transaction = new TransactionsController();

        
        if(isset($_POST['transaction_ipn_time_submit']))
        {
            
            $transaction->sendTransaction();
        }

        else
        {

            if(isset($_POST['transaction_type']) && in_array($_POST['transaction_type'], array('send', 'reqeust', 'donation', 'payment')))
            {

                $transaction->startTransaction($_POST['transaction_type']);
            }
            else if(isset($_POST['transaction_type']) && $_POST['transaction_type']=="checkbalance")
            {
               $transaction->checkBalance();
            }
            else 
            {

                // TODO: Write error message
            }
        }
    }
?>