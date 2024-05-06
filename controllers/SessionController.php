<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class SessionController
{

    private static $user_must_data = ['name', 'id', 'email', 'phone_number', 'role'];

    public static function checkLogin()
    {

        if (!isset($_SESSION['user'])) {
            self::notValidLoginCheck();
        }

        if (!isset($_SESSION['user']['id']) && !isset($_SESSION['user']['role'])) {
            self::notValidLoginCheck();
        }

        return true;
    }

    public static function checkUserLogin()
    {
        $login_done = self::checkLogin();

        if (!$login_done) {
            self::notValidLoginCheck();
        }

        if ($_SESSION['user']['role'] != 0) {
            self::notValidLoginCheck();
        }


        $must_exist = self::$user_must_data;
        foreach ($must_exist as $check_one) {
            if (!isset($_SESSION['user'][$check_one])) {

                self::notValidLoginCheck();
            }
        }
        return true;
    }

    public static function checkAdminLogin()
    {

        $login_done = self::checkLogin();

        if (!$login_done) {
            self::notValidLoginCheck();
        }

        if ($_SESSION['user']['role'] != 1) {
            self::notValidLoginCheck();
        }

        $must_exist = self::$user_must_data;
        foreach ($must_exist as $check_one) {
            if (!isset($_SESSION['user'][$check_one])) {
                self::notValidLoginCheck();
            }
        }
    }

    public static function checkTransaction($keep_it = false)
    {

        if (isset($_SESSION['keep_transaction_session'])) {
            unset($_SESSION['keep_transaction_session']);
        }


        if (isset($_SESSION['transaction'])) {
                        
            if (!$keep_it) {
                unset($_SESSION['transaction']);
            }
        } else {
            
            if ($keep_it) {

                self::notValidTransactionCheck();
            }
        }
    }

    public static function checkTransactionRequest($keep_it = false)
    {

        if (isset($_SESSION['keep_transaction_session_request'])) {
            unset($_SESSION['keep_transaction_session_request']);
        }


        if (isset($_SESSION['request'])) {

            if (!$keep_it) {
                unset($_SESSION['request']);
            }
        } else {

            if ($keep_it) {
                self::notValidTransactionCheck();
            }
        }
    }

    public static function checkTakeIpn($do_it = false)
    {

        if (isset($_SESSION['check_take_ipn'])) {
            unset($_SESSION['check_take_ipn']);
        }

        
        if ($do_it) {
            if (!isset($_SESSION['transaction'])) {
                
                header("location: ../user/index.php");
                exit();
            }

            if (isset($_SESSION['transaction']['status'])) {

                unset($_SESSION['transaction']);
                self::notValidTransactionCheck();
            }

        }
        return true;
    }

    public static function checkTransactionStatusPage($do_it = false)
    {

        if (isset($_SESSION['check_transaction_status_page'])) {
            unset($_SESSION['check_transaction_status_page']);
        }


        if ($do_it) {
            if (!isset($_SESSION['transaction'])) {

                header("location: ../user/index.php");
                exit();
            }
            if (!isset($_SESSION['transaction']['id'])) {

                unset($_SESSION['transaction']);
                self::notValidTransactionCheck();
            }

        }
        return true;
    }

    public static function notValidTransactionCheck()
    {

        header("location: ../user/index.php");
        exit();
    }

    public static function notValidLoginCheck()
    {
        session_destroy();

        header("location: ../auth/home.php");
        exit();
    }
}
