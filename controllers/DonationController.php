<?php
    

require_once 'CRUD.php';


class DonationController{
    protected $db;


        public function addDonation(donation $donation){
            $donation_name = $donation->getName();
            $acct_no = $donation->getAcct_No();
            
            $check ="SELECT * FROM donations WHERE name = '$donation_name' AND account_number ='$acct_no'";
            
            $existingdonations = CRUD::Select($check);
            
            if(empty($existingdonations)){
                $query = "INSERT INTO donations (name, account_number,balance) VALUES ('$donation_name', '$acct_no', '0.0')";
                
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
        public function viewAlldonations(){
            $query = "select * from donations";
            $result = CRUD::Select($query);
            if($result){
                return $result;
            }
            else{
                echo "NO DONATIONS TO SHOW";
                return false;
            }
        }
    }