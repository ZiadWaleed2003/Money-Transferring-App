<?php

require("controllers\CRUD.php");

class Transaction
{
    ////////////////////////////// Variables //////////////////////////////
    private $transaction_id;
    private $sender_card_id;
    private $receiver_card_id;
    private $amount;
    private $date;
    private $status;
    private $type;
    private $description;

    ////////////////////////////// CONSTRUCT //////////////////////////////

    public function __construct($sender_card_id = null, $receiver_card_id = null, $amount = null, $type = null, $description = null)
    {
        $this->setSenderCardId($sender_card_id);
        $this->setReceiverCardId($receiver_card_id);
        $this->setAmount($amount);
        $this->setType($type);
        $this->setDescription($description);
        // $this->setDate();
        // $this->setStatus($status);
        // $this->setTransactionId();
    }

    ////////////////////////////// METHODS //////////////////////////////
    // Setters
    public function setTransactionId()
    {
        $transaction_id = CRUD::Select("SELECT COUNT(*) FROM transactions");
        $this->transaction_id = intval($transaction_id);
    }

    public function setSenderCardId($sender_card_id)
    {
        $this->sender_card_id = Formation::cleanCardNumber($sender_card_id);
    }

    public function setReceiverCardId($receiver_card_id)
    {
        $this->receiver_card_id = Formation::cleanCardNumber($receiver_card_id);
    }

    public function setAmount($amount)
    {
        $this->amount = Formation::cleanAmount($amount);
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

    public function getSenderCardId()
    {
        return $this->sender_card_id;
    }

    public function getReceiverCardId()
    {
        return $this->receiver_card_id;
    }

    public function getAmount()
    {
        return $this->amount;
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


}
