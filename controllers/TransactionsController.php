<?php
session_start();

require_once('DBConnection.php');
require_once('../Models/Transaction.php');

class TransactionsController
{

    public function startTransaction($transaction_type)
    {
        /**
         * TO Start Transaction 4 values must be asigned to new Transaction()
         * [setSenderCardNumber, setReceiverCardNumber, setAmount, TODO_3bcar] 
         * 
         */

        $check_Transaction_start = new Transaction();

        try {

            $sql = "SELECT `number` FROM usercards WHERE id = $_POST[transaction_sender_card_number]";
            $check_Transaction_start->setSenderCardNumber(CRUD::Select($sql)[0]['number'] ?? null);

            $check_Transaction_start->setSenderId($_SESSION['user']['id'] ?? null);
            
            $check_Transaction_start->setAmount($_POST['transaction_amount'] ?? null);
            
            if ($transaction_type === 'send') {

                $check_Transaction_start->setReceiverCardNumber($_POST['transaction_receiver_card_number'] ?? null);
                $check_Transaction_start->setType(0);

                $check_Transaction_start->checkTransactionStart();
                $transaction_start = true;
            }
            else if($transaction_type === 'donation')
            {

                $check_Transaction_start->setReceiverId($_POST['transaction_donation_account_number'] ?? null);
                $check_Transaction_start->setType(2);
                
                $check_Transaction_start->checkTransactionStart();
                $transaction_start = true;
            }
            else if($transaction_type === 'bill')
            {
                
                $check_Transaction_start->setReceiverId($_POST['transaction_bill_account_number'] ?? null);
                $check_Transaction_start->setType(3);
                
                $check_Transaction_start->checkTransactionStart();
                $transaction_start = true;
            }
            // ADD MORE TRANSACTION TYPES

        } 
        catch (Exception $e)
         {

            $_SESSION['transaction']['error_message'] = $e->getMessage();
            $transaction_start = false;
        }


        if ($transaction_start) 
        {
            
            $_SESSION['transaction']['sender_card_number'] = $check_Transaction_start->getSenderCardNumber();
            $_SESSION['transaction']['receiver_card_number'] = $check_Transaction_start->getReceiverCardNumber();
            
            $_SESSION['transaction']['sender_id'] = $check_Transaction_start->getSenderId();
            $_SESSION['transaction']['receiver_id'] = $check_Transaction_start->getReceiverId();
            
            $_SESSION['transaction']['amount'] = $check_Transaction_start->getAmount();
            $_SESSION['transaction']['check_time_start'] = time() + 60;

            if($transaction_type === 'send')
            {
                $_SESSION['transaction']['type'] = 'send';
            }
            else if($transaction_type === 'donation')
            {
                $_SESSION['transaction']['type'] = 'donation';
            }
            else if($transaction_type === 'bill')
            {
                $_SESSION['transaction']['type'] = 'bill';
            }

            header('location: ../views/user/ipn.php');
            exit();
        } 
        else
        {
            if($transaction_type === 'send'){
                header('location: ../views/user/send-money.php');
            }
            else if($transaction_type === 'donation'){
                header('location: ../views/user/send-donation.php');
            }
            else if($transaction_type === 'bill'){
                header('location: ../views/user/pay-payment.php');
            }
            
            exit();
        }
    }


    public function sendTransaction()
    {

        $transaction = new Transaction();

        $transaction->setSenderCardNumber($_SESSION['transaction']['sender_card_number']) ?? null;
        $transaction->setReceiverCardNumber($_SESSION['transaction']['receiver_card_number']) ?? null;
        
        $transaction->setSenderId($_SESSION['user']['id'] ?? null);
        $transaction->setReceiverId($_SESSION['transaction']['receiver_id'] ?? null);

        $transaction->setAmount($_SESSION['transaction']['amount']) ?? null;
        
        $transaction->setDate();
        $transaction->setStatus(1);
        
        $transaction->setType($_SESSION['transaction']['type'] ?? null);
        $transaction->setDescription($_SESSION['transaction']['type'] ?? null);
        
        $transaction->setIpn(array(
            $_POST['transaction_ipn_1'] ?? null, $_POST['transaction_ipn_2'] ?? null,
            $_POST['transaction_ipn_3'] ?? null, $_POST['transaction_ipn_4'] ?? null,
            $_POST['transaction_ipn_5'] ?? null, $_POST['transaction_ipn_6'] ?? null,
        ));


        try {

            $transaction_id = $transaction->sendMoney($_SESSION['transaction']['check_time_start']);
            // $transaction_status = true;
        } catch (Exception $e) {

            $_SESSION['transaction']['error_message'] = $e->getMessage();
            // $transaction_status = false;
        } finally {

            $_SESSION['transaction']['id'] = $transaction_id ?? "??????????";
            header('location: ../views/user/view_transactions_status.php');
            exit();
        }
    }

    public function checkBalance()
    {
        try {
            session_start();

            $sql = "SELECT `number` FROM usercards WHERE id = " . $_POST["sender_card_number"];

            $transaction = new Transaction();
            $transaction->setSenderCardNumber(CRUD::Select($sql)[0]['number'] ?? null);

            $senderAmount = $transaction->checkBalance();


            echo "<script>alert('$senderAmount')</script>";
            if (isset($senderAmount)) {

                $_SESSION["transaction"]["check_balance"] = $senderAmount;
                header('location: ../views/user/balanceshow.php');
                exit();
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
}

?>

<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $transaction = new TransactionsController();

    if (isset($_POST['transaction_ipn_time_submit'])) 
    {

        $transaction->sendTransaction();
    }

    else if (isset($_POST['transaction_type']) && in_array($_POST['transaction_type'], array('send', 'reqeust', 'donation', 'bill'))) 
    {
     
        $transaction->startTransaction($_POST['transaction_type']);
    }

    else if (isset($_POST['transaction_type']) && $_POST['transaction_type'] == "checkbalance") 
    {
        $transaction->checkBalance();
    }
    
    else
    {

        // TODO: Write error message
    }
}
?>