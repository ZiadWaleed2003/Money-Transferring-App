<?php
    class bill{
        private $BillName;
        private $Acct_No;

        public function getBillName(){
            return $this->BillName;
        }
        public function setBillName($BillName){
            $this->BillName = BillName;
        }
        public function getAcct_No(){
            return $this->Acct_No;
        }
        public function setAcct_No($Acct_No){
            $this->Acct_No= $Acct_No;
        }

    }

?>