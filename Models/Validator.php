<?php
    class Validator{
        ////////////////////////////// Variables //////////////////////////////
        // Transaction Constants
        private static $cardNumberMAX = 16;
        private static $cardNumberMIN = 16;

        private static $ipn_size = 6;
        private static $ipn_max_time = 180; // sec

        private static $amountMAX = 99999;
        private static $transactionSTATUS = ['accepted', 'rejected'];
        private static $transactionTYPE = ['send', 'recieve'];

        
        ////////////////////////////// METHODS //////////////////////////////        
        // Transactions Valitaions
        public static function validateMax($value, $max){
            if(is_numeric($value) && $value <= $max){
                return true;
            }
            else{
                return false;
            }
        }

        public static function validateMin($value, $min){
            if(is_numeric($value) && $value >= $min){
                return true;
            }
            else{
                return false;
            }
        }
        
        public static function validateCardNumber($card_number){
            $card_length = strlen($card_number);
            if(self::validateMax($card_length, self::$cardNumberMAX) && self::validateMin($card_length, self::$cardNumberMIN) ){
                return true;
            }
            else{
                return false;
            }
        }

        public static function validateAmount($amount){
            if(self::validateMax($amount, self::$amountMAX) && self::validateMin($amount, 0)){
                return true;
            }
            else{
                return false;
            }
        }

        public static function validateAmountSubtract($current_amount, $subtract_amount){
            $new_amount = $current_amount - $subtract_amount;
            if(self::validateMin($new_amount, 0)){
                return true;
            }
            else {
                return false;
            }
        }

        public static function validateAmountAdd($current_amount, $add_amount){
            return true;
        }

        public static function validateIpnCheck($start_time, $send_time, $entered_ipn, $true_ipn){
            
            if( $send_time - $start_time > self::$ipn_max_time){
                if($entered_ipn == $true_ipn){
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        }

        public static function validateTransactionStatus($transaction_status){
            return in_array($transaction_status, self::$transactionSTATUS);
        }
        
        public static function validateTransactionType($transaction_type){
            return in_array($transaction_type, self::$transactionTYPE);

        }

    }