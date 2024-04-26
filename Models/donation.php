<?php
    class donation{
        private $Name;
        private $Acct_No;
        private $balance;

        public function getName(){
            return $this->Name;
        }
        public function setName($Name){
            $this->Name = Name;
        }
        public function getAcct_No(){
            return $this->Acct_No;
        }
        public function setAcct_No($Acct_No){
            $this->Acct_No= $Acct_No;
        }
        public function getBalance(){
            return $this->balance;
        }
        public function setbalance($balance){
            $this->balance = balance;
        }

    }

?>