<?php
    class bill{
        private $BillName;
        private $Acct_No;
        private $balance;


        public function getBillName(){
            return $this->BillName;
        }
        public function setBillName($BillName){
            $this->BillName = $BillName;
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
            $this->balance = $balance;
        }
    }

?>