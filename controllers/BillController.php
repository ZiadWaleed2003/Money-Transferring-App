<?php
    

require_once 'CRUD.php';


class BillController{
    protected $db;


        public function addBill(bill $bill){
            $billname = $bill->getBillName();
            $acct_no = $bill->getAcct_No();
            
            $check ="SELECT * FROM bills WHERE name = '$billname' AND account_number ='$acct_no'";
            
            $existingBills = CRUD::Select($check);
            
            if(empty($existingBills)){
                $query = "INSERT INTO bills (name, account_number,balance) VALUES ('$billname', '$acct_no', '0.0')";
                
                $result = CRUD::Insert($query);
                
                if($result !== false){
                    return true; 
                } else {
                    return false;
                }
            } else {
                return false; 
            }
        }
        public function viewAllbills(){
            $query = "select * from bills";
            $result = CRUD::Select($query);
            if($result){
                return $result;
            }
            else{
                return false;
            }
        }
    }