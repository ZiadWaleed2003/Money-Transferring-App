<?php
require "Formation.php";
    class Card{
        private $id;
        private $user_id;
        private $bank_id;
        private $name;
        private $number;
        private $cvv;
        private $ipn_code;
        private $balance;
        private $favourite;
        protected $db;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function setBankId($bank_id) {
        $this->bank_id = $bank_id;
    }

    public function getBankId() {
        return $this->bank_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getNumber() {
        return $this->number;
    }

    public function setNumber($number) {
        $this->number = Formation::cleanCardNumber($number);
    }

    public function getCvv() {
        return $this->cvv;
    }

    public function setCvv($cvv) {
        $this->cvv = $cvv;
    }

    public function getIpnCode() {
        return $this->ipn_code;
    }

    public function setIpnCode($ipn_code) {
        $this->ipn_code = $ipn_code;
    }

    public function getBalance() {
        return $this->balance;
    }

    public function setBalance($balance) {
        $this->balance = $balance;
    }

    public function getFavourite() {
        return $this->favourite;
    }

    public function setFavourite($favourite) {
        $this->favourite = $favourite;
    }


    }

