<?php
// 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
};

require("../controllers/CRUD.php");
require("Formation.php");
require("Validator.php");

class Transaction
{
    ////////////////////////////// Variables //////////////////////////////
    private $transaction_id;

    private $sender_card_number;
    private $receiver_card_number;

    private $sender_id;
    private $receiver_id;

    private $ipn;

    private $date;
    private $amount;

    private $type;
    private $status;
    private $description;

    private $conn;
    ////////////////////////////// CONSTRUCT //////////////////////////////

    public function __construct()
    {
    }

    ////////////////////////////// METHODS //////////////////////////////
    // Setters
    public function setConnection($conn)
    {
        // $this->$conn = $conn;
    }
    public function setSenderId($id, $card_number = null)
    {
        $this->sender_id = Formation::cleanNumber($id);
    }
    public function setReceiverId($id, $card_number = null)
    {
        $this->receiver_id = Formation::cleanNumber($id);
    }
    public function setTransactionId()
    {
        $sender_id = $this->getSenderId();
        $description = $this->getDescription();

        $sql = "SELECT id FROM transactions WHERE sender_id = $sender_id AND description = '$description' ORDER BY id DESC LIMIT 1";
        $transaction_id = CRUD::Select($sql)[0]['id'];

        $this->transaction_id = Formation::cleanNumber($transaction_id);
    }

    public function setSenderCardNumber($data)
    {

        if (isset($data['sender_card_number']) && $data['sender_card_number']) {

            $this->sender_card_number = Formation::cleanCardNumber($data['sender_card_number']);
        } else if (isset($data['sender_card_id']) && $data['sender_card_id']) {

            $sql = "SELECT `number` FROM usercards WHERE id = $data[sender_card_id]";
            $result = CRUD::Select($sql)[0]['number'];

            $this->sender_card_number = Formation::cleanCardNumber($result);
        } else {

            $this->sender_card_number = null;
        }
    }

    public function setReceiverCardNumber($data)
    {
        if (isset($data['receiver_card_number']) && $data['receiver_card_number']) {

            $this->receiver_card_number = Formation::cleanCardNumber($data['receiver_card_number']);
        } else if (isset($data['receiver_card_id']) && $data['receiver_card_id']) {

            $sql = "SELECT `number` FROM usercards WHERE id = $data[receiver_card_id] ";
            $result = CRUD::Select($sql)[0]['number'];

            $this->receiver_card_number = Formation::cleanCardNumber($result);
        } else {

            $this->receiver_card_number = null;
        }
    }

    public function setAmount($amount)
    {
        $this->amount = Formation::cleanAmount($amount);
    }
    public function setIpn($IPN)
    {
        $this->ipn = Formation::cleanIpn($IPN);
    }

    public function setDate()
    {
        $this->date = date("d-m-Y H:i:s", time() + 3600);
    }

    public function setStatus($status)
    {
        $this->status = Formation::cleanTransactionStatus($status);
    }

    public function setType($type)
    {
        $this->type = Formation::cleanTransactionType($type);
    }

    public function setDescription($description)
    {
        $this->description = Formation::cleanDescription($description);
    }

    // Getters
    public function getConnection()
    {
        return $this->conn;
    }

    public function getSenderId()
    {
        return $this->sender_id;
    }

    public function getReceiverId()
    {
        return $this->receiver_id;
    }

    public function getTransactionId()
    {
        return $this->transaction_id;
    }

    public function getSenderCardNumber()
    {
        return $this->sender_card_number;
    }

    public function getReceiverCardNumber()
    {
        return $this->receiver_card_number;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getIpn()
    {
        return $this->ipn;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getBalance($card_number)
    {
        if (Validator::validateCardNumber($card_number)) {
        }
    }

    public function getRequestData($request_id)
    {

        $sql = "SELECT rs.sender_id, rs.amount, uc.number AS sender_card_number, uc_alias.number AS receiver_card_number
        FROM requests AS rs
        INNER JOIN usercards AS uc ON rs.sender_id = uc.id
        INNER JOIN usercards AS uc_alias ON rs.reciever_id = uc_alias.id
        WHERE rs.id = $request_id";

        $request_data = CRUD::Select($sql)[0];

        return $request_data;
    }

    public function deleteRequest($request_id)
    {
        $sql = "DELETE FROM requests WHERE id = $request_id";
        $result = CRUD::Delete($sql);

        return $result;
    }

    public function checkTransactionStart()
    {
        /** Send Money Transactio Start Checking
         *     
         * First:  Check validation of Card Number Account from (sender and receiver)
         * Second: Check the Sender Card Number related to The user logged credentials
         * Third:  Check Sender Card has enough money to do the Send Money Transaction
         * 
         * At last if All is true save transaction data at session unti user send IPN TO complete transaction process
         */

        $sender_card_number = self::getSenderCardNumber();
        $receiver_card_number = self::getReceiverCardNumber();

        $receiver_id = self::getReceiverId();

        $amount = self::getAmount();
        $type = self::getType();

        try {

            if (!in_array($type, ['send', 'receive', 'donation', 'bill'])) {

                throw new Exception('Invalid Transaction Type');
            }


            // Check if Sender and Receiver not the same
            if (in_array($type, ['send', 'receive']) && $sender_card_number == $receiver_card_number) {

                throw new Exception("Can't Send money to the Same Sending Card");
            }


            // Here check Validation of Sender Card Number if (Sending | Receiving) operation
            if (!Validator::validateCardNumber($sender_card_number)) {

                throw new Exception("Invalid Sender Card Number");
            }


            // Here check Validation of Receiver Card Number if (Sending | Receiving) operation
            if (in_array($type, ['send', 'receive']) && !validator::validateCardNumber($receiver_card_number)) {

                throw new Exception("Invalid Receiver Card Number");
            }


            // Here Get Data of each Sender and Receiver data From DB
            $sql = "SELECT * FROM usercards WHERE `number` = $sender_card_number";
            $sender_card_data = CRUD::Select($sql);

            if (in_array($type, ['send', 'receive'])) {
                $sql = "SELECT * FROM usercards WHERE `number` = $receiver_card_number";
            } else if ($type == 'donation') {
                $sql = "SELECT * FROM donations WHERE `account_number` = $receiver_id";
            } else if ($type == 'bill') {
                $sql = "SELECT * FROM bills WHERE `account_number` = $receiver_id";
            }

            $receiver_card_data = CRUD::Select($sql);


            // Here check Exitance of This Sender Card Account !!(FIRST STEP)!!
            if (count($sender_card_data) != 1) {

                throw new Exception("Not Valid Sender Data");
            }


            // Here check Exitance of This Receiver Card Account  !!(FIRST STEP)!!
            if (in_array($type, ['send', 'receive']) && count($receiver_card_data) != 1) {

                throw new Exception("Not Valid Receiver Data");
            }


            // Here Set data in an single Dimension Associative Array
            $sender_card_data = $sender_card_data[0];
            $receiver_card_data = $receiver_card_data[0];


            // Check the Relativity of the Card Account to the Logged User  !!(SECOND STEP)!!
            if ($sender_card_data['user_id'] != $_SESSION['user']['id']) {

                throw new Exception("Unexpected Error (1001)");
            }

            if (!Validator::validateAmount($amount)) {

                throw new Exception("Not valid Amount");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    // Send Money
    public function sendMoney($transaction_check_time_start)
    {
        /**    
         * @First: Check validation of Card Number Account from (sender and receiver)
         * Second: Check the Sender Card Number related to The user logged credentials
         * Third: Check Sender Card IPN
         * Fourth: Check Sender Card has enough money to do the Send Money Transaction
         * 
         * At last if All is true make the transaction and check all is done then add the Transaction to the Transactions History
         */

        // Get All needed Data

        $sender_card_number = $this->getSenderCardNumber();
        $receiver_card_number = $this->getReceiverCardNumber();

        $transaction_sender_id = $this->getSenderId();
        $transaction_receiver_id = $this->getReceiverId();

        $transaction_amount = $this->getAmount();

        $transaction_type = $this->getType();
        $transaction_description = $this->getDescription();

        $ipn_to_check = $this->getIpn();


        try {

            // Here Get Data of each Sender and Receiver Cards data From DB
            $sql = "SELECT * FROM usercards WHERE `number` = $sender_card_number";
            $sender_card_data = CRUD::Select($sql)[0];

            if (in_array($transaction_type, ['send', 'receive'])) {
                $sql = "SELECT * FROM usercards WHERE `number` = $receiver_card_number";
            } else if ($transaction_type == 'donation') {
                $sql = "SELECT * FROM donations WHERE `account_number` = $transaction_receiver_id";
            } else if ($transaction_type == 'bill') {
                $sql = "SELECT * FROM bills WHERE `account_number` = $transaction_receiver_id";
            }


            $receiver_card_data = CRUD::Select($sql)[0];



            // Check IPN of Sender Card !!(THIRD STEP)!!
            if (Validator::validateIpnCheck($transaction_check_time_start, time(), $ipn_to_check, $sender_card_data['ipn_code'])) {

                // Check There Is Enough Balance to required Transaction Amount
                if (Validator::validateAmountSubtract($sender_card_data['balance'], $transaction_amount)) {

                    $this->setStatus(1);
                    $transaction_status = $this->getStatus();

                    $sender_update_sql = "UPDATE usercards SET balance = $sender_card_data[balance] - $transaction_amount WHERE `number` = $sender_card_number";

                    if (in_array($transaction_type, ['send', 'receive'])) {
                        $receiver_update_sql = "UPDATE usercards SET balance = $receiver_card_data[balance] + $transaction_amount WHERE `number` = $receiver_card_number";
                        $transaction_history_sql = "INSERT INTO transactions (sender_id, sender_card, reciever_id, reciever_card, date, status, description, amount)
                                                                    VALUES ($transaction_sender_id, '$sender_card_number', $receiver_card_data[user_id], '$receiver_card_number', CURRENT_TIMESTAMP, '$transaction_status', '$transaction_description', $transaction_amount)";
                    } else if ($transaction_type == 'donation') {
                        $receiver_update_sql = "UPDATE donations SET balance = $receiver_card_data[balance] + $transaction_amount WHERE `account_number` = $transaction_receiver_id";
                        $transaction_history_sql = "INSERT INTO transactions (sender_id, sender_card, reciever_id, date, status, description, amount)
                                                                    VALUES ($transaction_sender_id, '$sender_card_number', $receiver_card_data[account_number], CURRENT_TIMESTAMP, '$transaction_status', '$transaction_description', $transaction_amount)";
                    } else if ($transaction_type == 'bill') {
                        $receiver_update_sql = "UPDATE bills SET balance = $receiver_card_data[balance] + $transaction_amount WHERE `account_number` = $transaction_receiver_id";
                        $transaction_history_sql = "INSERT INTO transactions (sender_id, sender_card, reciever_id, date, status, description, amount)
                                                                    VALUES ($transaction_sender_id, '$sender_card_number', $receiver_card_data[account_number], CURRENT_TIMESTAMP, '$transaction_status', '$transaction_description', $transaction_amount)";
                    }


                    self::checkout($sender_update_sql, $receiver_update_sql, $transaction_history_sql);
                } else {
                    throw new Exception("Invalid Transaction Amount");
                }
            } else {
                if (Validator::validateMax($transaction_check_time_start, time())) {
                    throw new Exception("!! Timeout IPN CODE !!");
                } else {
                    throw new Exception("!! WRONG IPN CODE !!");
                }
            }
        } catch (Exception $e) {
            
            throw $e;
        }
    }


    private function checkout($sender_sql, $receiver_sql, $transaction_sql)
    {

        try {
            if ($sender_sql && $receiver_sql && $transaction_sql) {

                $result = CRUD::Update($sender_sql);
                if (!$result) {
                    throw new Exception("Transaction Failed - ERROR(9001)");
                }

                $result = CRUD::Update($receiver_sql);
                if (!$result) {
                    throw new Exception("Transaction Failed - ERROR(9002)");
                }

                $result = CRUD::Insert($transaction_sql);
                if (!$result) {
                    throw new Exception("Transaction Failed - ERROR(9003)");
                }

                $this->setTransactionId();
            } else {
                throw new Exception("Transaction Failed - ERROR(9000)");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function checkBalance()
    {
        $sender_card_number = self::getSenderCardNumber();

        try {
            $sql = "SELECT * FROM usercards WHERE number = $sender_card_number";
            $sender_card_data = CRUD::Select($sql);

            if (count($sender_card_data) != 1) {
                throw new Exception("not valid card number");
            }

            if ($sender_card_data[0]["user_id"] != $_SESSION['user']['id']) {
                throw new Exception("please enter correct card number");
            }

            return $sender_card_data[0]["balance"];
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function requestMoney()
    {
        $sender_card_number = $this->getSenderCardNumber();

        $receiver_card_number = $this->getReceiverCardNumber();
        $receiver_id = $this->getReceiverId();

        $amount = $this->getAmount();

        try {




            // Check if Sender and Receiver not the same
            if ($sender_card_number == $receiver_card_number) {

                throw new Exception("Can't Send money to the Same Sending Card");
            }


            // Here check Validation of Sender Card Number if (Sending | Receiving) operation
            if (!Validator::validateCardNumber($sender_card_number)) {

                throw new Exception("Invalid Sender Card Number");
            }


            // Here check Validation of Receiver Card Number if (Sending | Receiving) operation
            if (!validator::validateCardNumber($receiver_card_number)) {

                throw new Exception("Invalid Receiver Card Number");
            }


            // Here Get Data of each Sender and Receiver data From DB
            $sql = "SELECT * FROM usercards WHERE `number` = $sender_card_number";
            $sender_card_data = CRUD::Select($sql);

            $sql = "SELECT * FROM usercards WHERE `number` = $receiver_card_number";
            $receiver_card_data = CRUD::Select($sql);


            // Here check Exitance of This Sender Card Account !!(FIRST STEP)!!
            if (count($sender_card_data) != 1) {

                throw new Exception("Not Valid Sender Data");
            }


            // Here check Exitance of This Receiver Card Account  !!(FIRST STEP)!!
            if (count($receiver_card_data) != 1) {

                throw new Exception("Not Valid Receiver Data");
            }


            // Here Set data in an single Dimension Associative Array
            $sender_card_data = $sender_card_data[0];
            $receiver_card_data = $receiver_card_data[0];


            // Check the Relativity of the Card Account to the Logged User  !!(SECOND STEP)!!
            if ($receiver_card_data['user_id'] != $receiver_id) {

                throw new Exception("Unexpected Error (1001)");
            }

            if (!Validator::validateAmount($amount)) {

                throw new Exception("Not valid Amount");
            }

            $sql = "INSERT INTO requests (sender_id, reciever_id, amount, description, date) 
                             VALUES ($sender_card_data[id], $receiver_card_data[id], $amount, 'Give me a money', CURRENT_TIMESTAMP)";

            $result = CRUD::Insert($sql);


            if (!$result) {
                throw new Exception("ont valid request");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
}
