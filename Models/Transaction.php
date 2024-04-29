<?php
// session_start();

require("../controllers/CRUD.php");
require("Formation.php");
require("Validator.php");

class Transaction
{
    ////////////////////////////// Variables //////////////////////////////
    private $transaction_id;
    private $sender_card_number;
    private $receiver_card_number;

    private $ipn;

    private $date;
    private $amount;

    private $type;
    private $status;
    private $description;

    protected $conn;
    ////////////////////////////// CONSTRUCT //////////////////////////////

    public function __construct($conn)
    {
        self::$conn = $conn;
    }

    ////////////////////////////// METHODS //////////////////////////////
    // Setters
    public function setTransactionId()
    {
        $transaction_id = CRUD::Select("SELECT COUNT(*) FROM transactions");
        $this->transaction_id = intval($transaction_id);
    }

    public function setSenderCardNumber($sender_card_number)
    {
        $this->sender_card_number = Formation::cleanCardNumber($sender_card_number);
    }

    public function setReceiverCardNumber($receiver_card_number)
    {
        $this->receiver_card_number = Formation::cleanCardNumber($receiver_card_number);
    }

    public function setAmount($amount)
    {
        $this->amount = Formation::cleanAmount($amount);
    }
    public function setIpn($IPN)
    {
        $this->amount = Formation::cleanIpn($IPN);
    }

    public function setDate()
    {
        $this->date = date("d-m-Y H:i:s");
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

    public function checkTransactionStart($type)
    {
        
        try {

            if ($type === 'send') {

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
                $amount = self::getAmount();


                try {

                    // Check if Sender and Receiver Cards not the same
                    if ($sender_card_number != $receiver_card_number) {

                        // Here check Validation of Sender Card Number
                        if (Validator::validateCardNumber($sender_card_number)) {

                            // Here check Validation of Receiver Card Number
                            if (validator::validateCardNumber($receiver_card_number)) {

                                // Here Get Data of each Sender and Receiver Cards data From DB
                                $sql = "SELECT * FROM usercards WHERE `number` = $sender_card_number";
                                $sender_card_data = CRUD::Select($sql);

                                // var_dump($sender_card_data);
                                $sql = "SELECT * FROM usercards WHERE `number` = $receiver_card_number";
                                $receiver_card_data = CRUD::Select($sql);


                                // Here check Exitance of This Sender Card Account !!(FIRST STEP)!!
                                if (count($sender_card_data) == 1) {

                                    // Here check Exitance of This Receiver Card Account  !!(FIRST STEP)!!
                                    if (count($receiver_card_data) == 1) {

                                        // Here Set data in an single Dimension Associative Array
                                        $sender_card_data = $sender_card_data[0];
                                        $receiver_card_data = $receiver_card_data[0];

                                        // Check the Relativity of the Card Account to the Logged User  !!(SECOND STEP)!!
                                        if ($sender_card_data['user_id'] == $_SESSION['user_id']) {

                                            // Check Account Balance  !!(THIRD STEP)!!
                                            if (Validator::validateAmountSubtract($sender_card_data['balance'], $amount)) {
                                            } else {
                                                throw new Exception('!! NO ENOUGH ACCOUNT BALANCE !!');
                                            }
                                        } else {
                                            throw new Exception("Unexpected Error (1001)");
                                        }
                                    } else {
                                        throw new Exception("Not Valid Receiver card");
                                    }
                                } else {
                                    throw new Exception("Not Valid Sender card");
                                }
                            } else {
                                throw new Exception("Invalid Receiver Card Number");
                            }
                        } else {
                            throw new Exception("Invalid Sender Card Number");
                        }
                    } else {
                        throw new Exception("Can't Send money to the Same Sending Card");
                    }
                } catch (Exception $e) {

                    throw $e;
                }
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    // Send Money
    public function sendMoney($transaction_check_time_start)
    {
        session_start();
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

        $transaction_amount = $this->getAmount();
        $transaction_status = $this->getStatus();
        
        $ipn_to_check = $this->getIpn();

        try {

            // Here Get Data of each Sender and Receiver Cards data From DB
            $sql = "SELECT * FROM usercards WHERE `number` = $sender_card_number";
            $sender_card_data = CRUD::Select($sql);

            $sql = "SELECT * FROM usercards WHERE number == $receiver_card_number";
            $receiver_card_data = CRUD::Select($sql);

            // Check IPN of Sender Card !!(THIRD STEP)!!
            if (Validator::validateIpnCheck($transaction_check_time_start, time(), $ipn_to_check, $sender_card_data['ipn_code'])) {

                // Check There Is Enough Balance to required Transaction Amount
                if (Validator::validateAmountSubtract($sender_card_data['balance'], $transaction_amount)) {

                    $sender_update_sql = "UPDATE usercards SET balance = $sender_card_data[balance] - $transaction_amount WHERE number = $sender_card_number";

                    $receiver_update_sql = "UPDATE usercards SET balance = $receiver_card_data[balance] + $transaction_amount WHERE number = $receiver_card_number";

                    $transaction_history_sql = "INSERT INTO transactions (sender_id, reciever_id, date, status, description, amount) VALUES($sender_card_number, $receiver_card_number, CURDATE(), $transaction_status, 'Sending Money Transaction', $transaction_amount)";

                    self::checkout($sender_update_sql, $receiver_update_sql, $transaction_history_sql);
            
                } else {
                    throw new Exception("Invalid Transaction Amount");
                }
            } else {
                throw new Exception("!! WRONG IPN CODE !!");
            }
        } catch (Exception $e) {

            throw $e;
        }
    }
  
    private function checkout($sender_sql, $receiver_sql, $transaction_sql)
    {
        try{
            if($sender_sql && $receiver_sql && $transaction_sql){
                
                $result = CRUD::Update($sender_sql);
                if(!$result){
                    throw new Exception("Unexpected Error - Transaction Failed");
                }

                $result = CRUD::Update($receiver_sql);
                if(!$result){
                    throw new Exception("Unexpected Error - Transaction Failed");
                }
                
                $result = CRUD::Insert($transaction_sql);
                if(!$result){
                    throw new Exception("Unexpected Error - Transaction Failed");
                }
            }
            else {
                throw new Exception("Unexpected Error - Transaction Failed");
            }
        } catch (Exception $e){
            throw $e;
        }
    }
}
