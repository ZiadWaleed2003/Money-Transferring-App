<?php

session_start();

class SessionController{

    private static $user_must_data = ['name', 'id', 'email', 'role'];

    public static function checkLogin(){
        
        if(!isset($_SESSION['user'])){
            header("location: ../auth/home.html");
            exit();
        }
        
        if(!isset($_SESSION['user']['id']) && !isset($_SESSION['user']['role'])){
            header("location: ../auth/home.html");
            exit();
        }
    }

    public static function checkUserLogin()
    {
        $login_done = self::checkLogin();

        if(!$login_done){
            header("location: ../auth/home.html");
            exit();
        }

        if($_SESSION['user']['role'] == 0){
            header("location: ../auth/home.html");
            exit();
        }
    
        $must_exist = self::$user_must_data;
        foreach($must_exist as $check_one){
            if(!isset($_SESSION['user'][$check_one])){
        
                // LOGOUT
        
                header("location: ../auth/home.html");
                exit();
            }
        }
    }
    
    public static function checkAdminLogin()
    {
        
        $login_done = self::checkLogin();

        if(!$login_done){
            header("location: ../auth/home.html");
            exit();
        }

        if($_SESSION['user']['role'] == 1){
            header("location: ../auth/home.html");
            exit();
        }
    
        $must_exist = self::$user_must_data;
        foreach($must_exist as $check_one){
            if(!isset($_SESSION['user'][$check_one])){
        
                // LOGOUT
        
                header("location: ../auth/home.html");
                exit();
            }
        }
    }

    public static function checkTransaction($keep_it = false){
        
        if(isset($_SESSION['transaction'])){

            if(!$keep_it){
                unset($_SESSION['transaction']);

            }
        }
        else{

            if($keep_it){
                header("location: ../user/transactions.php");
            }
        }
    }
    
    public static function checkTransactionRequest($keep_it = false){
        
        if(isset($_SESSION['request'])){
            
            if(!$keep_it){
                unset($_SESSION['request']);
            }
        }
        else{
    
            if($keep_it){
                header("location: ../user/transactions.php");
            }
        }
    }

    public static function checkTakeIpn(){

        if(!isset($_SESSION['transactions'])){

            unset($_SESSION['transactions']);
            echo "window.history.go(-1);";
        }
        if(isset($_SESSION['transactions']['status'])){

            unset($_SESSION['transactions']);
            header("location: ../user/transactions.php");
            exit();
        }

        return true;
    }

}