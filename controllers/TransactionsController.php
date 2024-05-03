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


            
            if ($transaction_type === 'send') 
            {
                
                $sql = "SELECT `number` FROM usercards WHERE id = $_POST[transaction_sender_card_number]";
                $check_Transaction_start->setSenderCardNumber(CRUD::Select($sql)[0]['number'] ?? null);
                $check_Transaction_start->setSenderId($_SESSION['user']['id'] ?? null);
                
                $check_Transaction_start->setReceiverCardNumber($_POST['transaction_receiver_card_number'] ?? null);
                
                $check_Transaction_start->setType(0);
                $check_Transaction_start->setAmount($_POST['transaction_amount'] ?? null);
                
                $check_Transaction_start->checkTransactionStart();
                $transaction_start = true;
            }
            else if($transaction_type === 'receive')
            {
                
                if(isset($_POST['request_status']) && $_POST['request_status'] === 'accept')
                {
                    $request_id = $_POST['request_id'];
                    $user_id = $_SESSION['user']['id'];

                    $sql = "SELECT rs.sender_id, rs.amount, uc.number AS sender_card_number, uc_alias.number AS receiver_card_number
                            FROM requests AS rs
                            INNER JOIN usercards AS uc ON rs.sender_id = uc.id
                            INNER JOIN usercards AS uc_alias ON rs.reciever_id = uc_alias.id
                            WHERE rs.id = $request_id";
                    
                    $request_data = CRUD::Select($sql)[0];
                    
                    $check_Transaction_start->setSenderCardNumber($request_data['sender_card_number'] ?? null);
                    $check_Transaction_start->setSenderId($user_id ?? null);
                    
                    $check_Transaction_start->setReceiverCardNumber($request_data['receiver_card_number'] ?? null);
                    
                    $check_Transaction_start->setType(1);
                    $check_Transaction_start->setAmount($request_data['amount'] ?? null);
                    
                    $check_Transaction_start->checkTransactionStart();
                    $_SESSION['request']['id'] = $request_id;
                    $transaction_start = true;
                }
                else 
                {
                    
                    $sql = "DELETE FROM requests WHERE id = $_POST[request_id]";
                    $result = CRUD::Delete($sql);
                    
                    if(!$result)
                    {
                        throw new Exception("Unsuccessful reqeust Delete");
                    }
                }
                
            }
            else if($transaction_type === 'donation')
            {
                
                $sql = "SELECT `number` FROM usercards WHERE id = $_POST[transaction_sender_card_number]";
                $check_Transaction_start->setSenderCardNumber(CRUD::Select($sql)[0]['number'] ?? null);
                $check_Transaction_start->setSenderId($_SESSION['user']['id'] ?? null);
                
                
                $check_Transaction_start->setReceiverId($_POST['transaction_donation_account_number'] ?? null);
                
                $check_Transaction_start->setType(2);
                $check_Transaction_start->setAmount($_POST['transaction_amount'] ?? null);
                
                $check_Transaction_start->checkTransactionStart();
                $transaction_start = true;
            }
            else if($transaction_type === 'bill')
            {
                $sql = "SELECT `number` FROM usercards WHERE id = $_POST[transaction_sender_card_number]";
                $check_Transaction_start->setSenderCardNumber(CRUD::Select($sql)[0]['number'] ?? null);
                $check_Transaction_start->setSenderId($_SESSION['user']['id'] ?? null);
                
                $check_Transaction_start->setReceiverId($_POST['transaction_bill_account_number'] ?? null);
                
                $check_Transaction_start->setType(3);
                $check_Transaction_start->setAmount($_POST['transaction_amount'] ?? null);
                
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
        finally
        {
        
            if (isset($transaction_start) && $transaction_start) 
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
                else if($transaction_type === 'receive')
                {
                    $_SESSION['transaction']['type'] = 'receive';
                }
                else if($transaction_type === 'donation')
                {
                    $_SESSION['transaction']['type'] = 'donation';
                }
                else if($transaction_type === 'bill')
                {
                    $_SESSION['transaction']['type'] = 'bill';
                }
                
                // var_dump($_SESSION['transaction']);
                header('location: ../views/user/ipn.php');
                exit();
            } 
            else
            {
                if($transaction_type === 'send'){
                    header('location: ../views/user/send-money.php');
                }
                else if($transaction_type === 'receive'){
                    header('location: ../views/user/requistlist.php');
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
        
        $transaction->setType($_SESSION['transaction']['type'] ?? null);
        $transaction->setDescription($_SESSION['transaction']['type'] ?? null);
        
        $transaction->setIpn(array(
            $_POST['transaction_ipn_1'] ?? null, $_POST['transaction_ipn_2'] ?? null,
            $_POST['transaction_ipn_3'] ?? null, $_POST['transaction_ipn_4'] ?? null,
            $_POST['transaction_ipn_5'] ?? null, $_POST['transaction_ipn_6'] ?? null,
        ));
        
        
        try {
            
            $transaction->setStatus(1);
            $transaction->sendMoney($_SESSION['transaction']['check_time_start']);
            $transaction_status = true;
        } catch (Exception $e) {
            
            $transaction->setStatus(0);
            $_SESSION['transaction']['error_message'] = $e->getMessage();
            $transaction_status = false;
        } finally {
            if(isset($_SESSION['request']['id'])){
                $sql = "DELETE FROM requests WHERE id = " . $_SESSION['request']['id'];
                CRUD::Delete($sql);
                
                unset($_SESSION['request']);
            }

            $sender_id = $transaction->getSenderId();
            $_SESSION['transaction']['sender_name'] = CRUD::Select("SELECT name FROM users WHERE $sender_id = id")[0]['name'];
            
            $transaction_type = $transaction->getType();

            if(in_array($transaction_type, ['send', 'receive'])){
                $receiver_card_number = $transaction->getReceiverCardNumber();
                $receiver_name_sql = "  SELECT u.name FROM usercards AS uc 
                                        INNER JOIN users AS u 
                                        ON u.id = uc.user_id AND uc.number = $receiver_card_number";
            }
            else if($transaction_type == 'donation'){
                $receiver_id = $transaction->getReceiverId();
                $receiver_name_sql = "SELECT name FROM donations WHERE `account_number` = $receiver_id";
            }
            else if($transaction_type == 'bill'){
                $receiver_id = $transaction->getReceiverId();
                $receiver_name_sql = "SELECT name FROM bills WHERE `account_number` = $receiver_id";
            }

            $_SESSION['transaction']['receiver_name'] = CRUD::Select($receiver_name_sql)[0]['name'];
            $_SESSION['transaction']['receiver_name'] = CRUD::Select($receiver_name_sql)[0]['name'];

            $_SESSION['transaction']['status'] = $transaction->getStatus();
            $_SESSION['transaction']['date'] = $transaction->getDate();

            $_SESSION['transaction']['id'] = $transaction->getTransactionId() ?? "????????????";
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

    public function requestMoney()
    {
        $request_money = new Transaction();
        try{
            $request_money->setSenderCardNumber($_POST['transaction_sender_card_number'] ?? null);
            
            $sql = "SELECT `number` FROM usercards WHERE id = $_POST[transaction_receiver_card_number]";
            
            $request_money->setReceiverCardNumber(CRUD::Select($sql)[0]['number'] ?? null);
            
            $request_money->setReceiverId($_SESSION['user']['id'] ?? null);
            
            $request_money->setAmount($_POST['transaction_amount'] ?? null);


            $request_money->requestMoney();
            
            
            $_SESSION['request']['success_message'] = "request done successful";
        }
        catch (Exception $e){

            $_SESSION['request']['error_message'] = $e->getMessage();
        }
        finally{

            header('location: ../views/user/recievemoney.php');
            exit();

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

    else if (isset($_POST['transaction_type']) && in_array($_POST['transaction_type'], array('send', 'receive', 'donation', 'bill'))) 
    {
        $transaction->startTransaction($_POST['transaction_type']);
    }

    else if (isset($_POST['transaction_type']) && $_POST['transaction_type'] == "checkbalance") 
    {
        $transaction->checkBalance();
    }
    else if (isset($_POST['transaction_type']) && $_POST['transaction_type'] == "request") 
    {
        $transaction->requestMoney();
    }
    
    else
    {

        // TODO: Write error message
    }
}
?>