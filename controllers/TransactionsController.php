<?php

require_once('DBConnection.php');
require_once('../Models/Transaction.php');

class TransactionsController
{

    public function startTransaction($transaction_type)
    {
        // session_start();

        // $_SESSION['transaction_type'] = $transaction_type ?? null;
        // $_SESSION['transaction_amount'] = $_POST['transaction_amount'] ?? null;
     
        // $_SESSION['transaction_sender_card_number'] = $_POST['transaction_sender_card_number'] ?? null;
        // $_SESSION['transaction_receiver_card_number'] = $_POST['transaction_receiver_card_number'] ?? null;
     
        // $_SESSION['transaction_payment_name'] = $_POST['transaction_payment_name'] ?? null;
        // $_SESSION['transaction_donation_name'] = $_POST['transaction_donation_name'] ?? null;

        // $_SESSION['transaction_check_time_start'] = $_POST['transaction_check_time_start'] ?? null;
        
        

        $check_Transaction_start = new Transaction(new DBConnection());
        
        try
        {
            
            if($transaction_type === 'send')
            {
                
                session_start();

                $sql = "SELECT `number` FROM usercards WHERE user_id = $_SESSION[user_id]";

                $check_Transaction_start->setSenderCardNumber(CRUD::Select($sql)[0]['number'] ?? null);
                $check_Transaction_start->setReceiverCardNumber($_POST['transaction_receiver_card_number'] ?? null);
                $check_Transaction_start->setAmount($_POST['transaction_amount'] ?? null);

                $check_Transaction_start->checkTransactionStart('send');
                $transaction_start = true;

            }
        }
        catch(Exception $e)
        {

            $_SESSION['transaction_error_message'] = $e->getMessage();
            $transaction_start = false;
        }


        if($transaction_start)
        {
            $_SESSION['transaction_sender_card_number'] = $check_Transaction_start->getSenderCardNumber();
            $_SESSION['transaction_receiver_card_number'] = $check_Transaction_start->getReceiverCardNumber();
            $_SESSION['transaction_amount'] = $check_Transaction_start->getAmount();
            $_SESSION['transaction_check_time_start'] = time() + 60;
            $_SESSION['transaction_type'] = 'send';

            header('location: ../views/user/ipn.php');
            exit();
        }

    }


    public function sendTransaction()
    {

        // $sender_card   = isset($_POST['sender_card_number']) ? Formation::cleanCardNumber($_POST['sender_card_number']) : null;
        // $receiver_card = isset($_POST['receiver_card_number']) ? Formation::cleanCardNumber($_POST['receiver_card_number']) : null;
        // $amount        = isset($_POST['amount'])        ? Formation::cleanAmount($_POST['amount']) : null;

        // if (!$sender_card || !$receiver_card || !$amount) {
        //     $errorMessage = "Please fill in all fields.";

        //     return;
        // }

        // $transaction = new Transaction($sender_card, $receiver_card, $amount);

        // try {
        //     $transaction->sendMoney($conn = new DBConnection());
        //     $transactionSuccess = true;
        // } catch (Exception $e) {
        //     $transactionSuccess = false;
        // }

        // if ($transactionSuccess) {
        //     self::checkout();
        // } else {
        //     // Write error message
        // }
        try{
            
            $transaction = new Transaction(new DBConnection());
            $transaction->setSenderCardNumber($_SESSION['transaction_sender_card_number']) ?? null;
            $transaction->setReceiverCardNumber($_SESSION['transaction_receiver_card_number']) ?? null;
            $transaction->setAmount($_SESSION['transaction_amount']) ?? null;
            $transaction->setIpn(array($_POST['transaction_ipn_1'] ?? null, $_POST['transaction_ipn_2'] ?? null, 
                                       $_POST['transaction_ipn_3'] ?? null, $_POST['transaction_ipn_4'] ?? null, 
                                       $_POST['transaction_ipn_5'] ?? null, $_POST['transaction_ipn_6'] ?? null, ))?? null;
            $transaction->setStatus(1);
        
            $transaction->sendMoney($_SESSION['transaction_check_time_start']);
            $transaction_approved = true;
        }
        catch (Exception $e)
        {
            $transaction_approved = false;
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
        
        if(isset($_POST['transaction_ipn_check']))
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