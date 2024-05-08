<?php
if (session_status() === PHP_SESSION_NONE) {
};
session_start();
?>

<?php

require_once('DBConnection.php');
require_once('../Models/Transaction.php');
?>

<?php

$handleRequest = new TransactionsController();

// Run Transaction Controller
$handleRequest->handleRequest();
?>

<?php

class TransactionsController
{
    private $transaction_type;

    public function __construct()
    {
        // $this->$transaction = $transaction;
    }

    public function handleRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

            throw new Exception('Invalid request method');
        }

        try {
            if (isset($_POST['transaction_ipn_time_submit'])) {

                $action = 'sendTransaction';
            } else {

                $action = $_POST['transaction_type'];

                if (!in_array($action, ['send', 'receive', 'donation', 'bill', 'checkbalance', 'request'])) {

                    throw new Exception('Invalid Transaction type');
                }
            }

            switch ($action) {
                case 'send':
                case 'receive':
                case 'donation':
                case 'bill':
                    $this->startTransaction($action);
                    break;
                case 'checkbalance':
                    $this->checkBalance();
                    break;
                case 'request':
                    $this->requestMoney();
                    break;
                case 'sendTransaction':
                    $this->sendTransaction();
                    break;
            }
        } catch (Exception $e) {

            // Handle general exceptions
            $this->handleError($e->getMessage());
        }
    }

    public function requestMoney()
    {
        $request_transaction = new Transaction();
        try {

            // Set Values to Model
            $request_transaction->setSenderCardNumber(['sender_card_number' => $_POST['transaction_sender_card_number']] ?? null);

            $request_transaction->setReceiverCardNumber(['receiver_card_id' => $_POST['transaction_receiver_card_id']]);
            $request_transaction->setReceiverId($_SESSION['user']['id'] ?? null);

            $request_transaction->setAmount($_POST['transaction_amount'] ?? null);


            // Run Model
            $request_transaction->requestMoney();

            // Set success message 
            $this->handleSuccess("request done successful");
            $this->successRedirectBasedOnTransactionType("request");
        } catch (Exception $e) {

            // Set error message 
            $this->handleError($e->getMessage());
            $this->refucesdRedirectBasedOnTransactionType("request");
        }
    }

    public function checkBalance()
    {
        $transaction = new Transaction();
        try {


            $transaction->setSenderCardNumber(['sender_card_id' => $_POST["transaction_sender_card_id"]]);

            // Run Model
            $senderAmount = $transaction->checkBalance();


            if (isset($senderAmount)) {
                // Set Balance Value
                $_SESSION["transaction"]["check_balance"] = $senderAmount;

                $this->successRedirectBasedOnTransactionType("checkbalance");
            } else {
                throw new Exception("Unxepected Error");
            }
        } catch (Exception $e) {

            // Set error message 
            $this->handleError($e->getMessage());
            $this->refucesdRedirectBasedOnTransactionType("checkbalance");
        }
    }

    public function startTransaction($transaction_type)
    {
        /**
         * TO Start Transaction 4 values must be asigned to new Transaction()
         * [setSenderCardNumber, setReceiverCardNumber, setAmount, TODO_3bcar] 
         * 
         */

        $check_Transaction_start = new Transaction();

        try {

            if ($transaction_type === 'send') {

                $check_Transaction_start->setSenderCardNumber(['sender_card_id' => $_POST['transaction_sender_card_id']] ?? null);
                $check_Transaction_start->setSenderId($_SESSION['user']['id'] ?? null);

                $check_Transaction_start->setReceiverCardNumber(['receiver_card_number' => $_POST['transaction_receiver_card_number']]  ?? null);

                $check_Transaction_start->setType(0);
                $check_Transaction_start->setAmount($_POST['transaction_amount'] ?? null);


                // Run Model
                $check_Transaction_start->checkTransactionStart();
            } else if ($transaction_type === 'receive') {
                $request_id = $_POST['request_id'];
                $user_id = $_SESSION['user']['id'];

                if (isset($_POST['request_status']) && $_POST['request_status'] === 'accept') {
                    $request_data = $check_Transaction_start->getRequestData($request_id);

                    $check_Transaction_start->setSenderCardNumber(['sender_card_number' => $request_data['sender_card_number']] ?? null);
                    $check_Transaction_start->setSenderId($user_id ?? null);

                    $check_Transaction_start->setReceiverCardNumber(['receiver_card_number' => $request_data['receiver_card_number']] ?? null);

                    $check_Transaction_start->setType(1);
                    $check_Transaction_start->setAmount($request_data['amount'] ?? null);


                    // Run Model
                    $check_Transaction_start->checkTransactionStart();

                    $this->setSession('request', ['id' => $request_id]);
                } else {

                    $result = $check_Transaction_start->deleteRequest($request_id);

                    if (!$result) {
                        throw new Exception("Unsuccessful reqeust Delete");
                    } else {
                        $this->handleSuccess("Request deleted successfully");
                        $this->successRedirectBasedOnTransactionType('refuseRequest');
                    }
                }
            } else if ($transaction_type === 'donation') {

                $check_Transaction_start->setSenderCardNumber(['sender_card_id' => $_POST['transaction_sender_card_id']] ?? null);
                $check_Transaction_start->setSenderId($_SESSION['user']['id'] ?? null);

                $check_Transaction_start->setReceiverId($_POST['transaction_donation_account_number'] ?? null);

                $check_Transaction_start->setType(2);
                $check_Transaction_start->setAmount($_POST['transaction_amount'] ?? null);

                // Run Model
                $check_Transaction_start->checkTransactionStart();
            } else if ($transaction_type === 'bill') {

                $check_Transaction_start->setSenderCardNumber(['sender_card_id' => $_POST['transaction_sender_card_id']] ?? null);
                $check_Transaction_start->setSenderId($_SESSION['user']['id'] ?? null);

                $check_Transaction_start->setReceiverId($_POST['transaction_bill_account_number'] ?? null);

                $check_Transaction_start->setType(3);
                $check_Transaction_start->setAmount($_POST['transaction_amount'] ?? null);

                // Run Model
                $check_Transaction_start->checkTransactionStart();
            }

            // ADD MORE TRANSACTION TYPES


        } catch (Exception $e) {
            $this->handleError($e->getMessage());
            $this->refucesdRedirectBasedOnTransactionType($transaction_type);
        } finally {

            $session_data = [

                'sender_card_number' => $check_Transaction_start->getSenderCardNumber(),
                'receiver_card_number' => $check_Transaction_start->getReceiverCardNumber(),

                'sender_id' => $check_Transaction_start->getSenderId(),
                'receiver_id' => $check_Transaction_start->getReceiverId(),

                'amount' => $check_Transaction_start->getAmount(),
                'check_time_start' => time() + 60,

                'type' => $transaction_type
            ];

            $this->setSession('transaction', $session_data);
            $this->successRedirectBasedOnTransactionType($transaction_type);
        }
    }

    private function sendTransaction()
    {

        $transaction = new Transaction();

        $transaction->setSenderCardNumber(['sender_card_number' => $_SESSION['transaction']['sender_card_number']]) ?? null;
        $transaction->setReceiverCardNumber(['receiver_card_number' => $_SESSION['transaction']['receiver_card_number']]) ?? null;

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
        } catch (Exception $e) {

            $transaction->setStatus(0);
            $_SESSION['transaction']['error_message'] = $e->getMessage();
        } finally {

            $sender_id = $transaction->getSenderId();
            $_SESSION['transaction']['sender_name'] = CRUD::Select("SELECT name FROM users WHERE $sender_id = id")[0]['name'];
            $transaction_type = $transaction->getType();


            if (in_array($transaction_type, ['send', 'receive'])) {
                $receiver_card_number = $transaction->getReceiverCardNumber();
                $receiver_name_sql = "  SELECT u.name FROM usercards AS uc 
                                        INNER JOIN users AS u 
                                        ON u.id = uc.user_id AND uc.number = $receiver_card_number";
            } else if ($transaction_type == 'donation') {
                $receiver_id = $transaction->getReceiverId();
                $receiver_name_sql = "SELECT name FROM donations WHERE `account_number` = $receiver_id";
            } else if ($transaction_type == 'bill') {
                $receiver_id = $transaction->getReceiverId();
                $receiver_name_sql = "SELECT name FROM bills WHERE `account_number` = $receiver_id";
            }

            $session_data = [
                'receiver_name' => CRUD::Select($receiver_name_sql)[0]['name'],
                'receiver_name' => CRUD::Select($receiver_name_sql)[0]['name'],

                'status' => $transaction->getStatus(),
                'date' => $transaction->getDate(),

                'id' => $transaction->getTransactionId() ?? "????????????"
            ];

            $this->setSession('transaction', $session_data);

            if (isset($_SESSION['request']['id']) && $transaction->getStatus() === Formation::cleanTransactionStatus(1)) {
                $transaction->deleteRequest($_SESSION['request']['id']);

                unset($_SESSION['request']);
            }

            header('location: ../views/user/view_transactions_status.php');
            exit();
        }
    }

    private function refucesdRedirectBasedOnTransactionType($type)
    {
        $redirectUrl = '../Views/user/';
        switch ($type) {
            case 'send':
                $redirectUrl .= 'send-money.php';
                break;

            case 'receive':
                $redirectUrl .= 'requistlist.php';
                break;

            case 'donation':
                $redirectUrl .= 'send-donation.php';
                break;

            case 'bill':
                $redirectUrl .= 'pay-payment.php';
                break;

            case 'request':
                $redirectUrl .= 'recievemoney.php';
                break;

            case 'checkbalance':
                $redirectUrl .= 'checkbalance.php';
                break;
        }
        header('location: ' . $redirectUrl);
        exit();
    }

    private function successRedirectBasedOnTransactionType($type)
    {

        $redirectUrl = '../Views/user/';
        switch ($type) {
            case 'refuseRequest':
                $redirectUrl .= 'requistlist.php';
                break;
            case 'send':
            case 'receive':
            case 'donation':
            case 'bill':
                $redirectUrl .= 'IPN.php';
                break;

            case 'request':
                $redirectUrl .= 'recievemoney.php';
                break;

            case 'checkbalance':
                $redirectUrl .= 'balanceshow.php';
                break;
        }

        header('location: ' . $redirectUrl);
        exit();
    }

    private function handleSuccess($message)
    {
        $_SESSION['success_message'] = $message;
    }

    private function handleError($message)
    {
        $_SESSION['error_message'] = $message;
    }

    private function setSession($root_name, $data)
    {
        if (isset($_SESSION[$root_name])) {
            $_SESSION[$root_name] = array_merge($_SESSION[$root_name], $data);
        } else {
            $_SESSION[$root_name] = $data;
        }
    }
}

?>