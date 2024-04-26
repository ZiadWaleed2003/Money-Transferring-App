<?php
    
require_once '../../Models/bill.php';
require_once 'DBConnection.php';
require_once 'CRUD.php';


class BillController{
    protected $db;


        public function addBill(bill $bill){
            $billname = $bill->getBillName();
            $acct_no = $bill->getAcct_No();
            
            // Query to check if the bank with the given name and ID already exists
            $check ="SELECT * FROM bills WHERE name = '$billname' AND account_number ='$acct_no'";
            
            // Performing the query to check for existing banks
            $existingBills = CRUD::Select($check);
            
            // Checking if there are no existing banks with the same name and ID
            if(empty($existingBills)){
                // Query to insert the new bank into the database
                $query = "INSERT INTO bills (name, account_number,balance) VALUES ('$billname', '$acct_no', '0.0')";
                
                // Performing the query to insert the new bank
                $result = CRUD::Insert($query);
                
                // Checking if the insertion was successful
                if($result !== false){
                    return true; // Bank successfully added
                } else {
                    return false; // Bank not added due to insertion failure
                }
            } else {
                return false; // Bank not added because a bank with the same name and ID already exists
            }
        }
    }