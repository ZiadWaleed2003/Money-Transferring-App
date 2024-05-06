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
            self::notValidCheck();
        }

        if (!isset($_SESSION['user']['id']) && !isset($_SESSION['user']['role'])) {
            self::notValidCheck();
        }

        return true;
    }

    public static function checkUserLogin()
    {
        $login_done = self::checkLogin();

        if (!$login_done) {
            self::notValidCheck();
        }

        if ($_SESSION['user']['role'] != 0) {
            self::notValidCheck();
        }


        $must_exist = self::$user_must_data;
        foreach ($must_exist as $check_one) {
            if (!isset($_SESSION['user'][$check_one])) {

                self::notValidCheck();
            }
        }
        return true;
    }

    public static function checkAdminLogin()
    {

        $login_done = self::checkLogin();

        if (!$login_done) {
            self::notValidCheck();
        }

        if ($_SESSION['user']['role'] != 1) {
            self::notValidCheck();
        }

        $must_exist = self::$user_must_data;
        foreach ($must_exist as $check_one) {
            if (!isset($_SESSION['user'][$check_one])) {
                self::notValidCheck();
            }
        }
    }

    public static function checkTransaction($keep_it = false)
    {

        if (!isset($_SESSION['keep_transaction_session'])) {
            unset($_SESSION['keep_transaction_session']);
        }


        if (isset($_SESSION['transaction'])) {

            if (!$keep_it) {
                unset($_SESSION['transaction']);
            }
        } else {

            if ($keep_it) {
                header("location: ../user/transactions.php");
            }
        }
    }

    public static function checkTransactionRequest($keep_it = false)
    {

        if (!isset($_SESSION['keep_transaction_session_request'])) {
            unset($_SESSION['keep_transaction_session_request']);
        }


        if (isset($_SESSION['request'])) {

            if (!$keep_it) {
                unset($_SESSION['request']);
            }
        } else {

            if ($keep_it) {
                header("location: ../user/transactions.php");
            }
        }
    }

    public static function checkTakeIpn($do_it = false)
    {

        if (!isset($_SESSION['check_take_ipn'])) {
            unset($_SESSION['check_take_ipn']);
        }


        if ($do_it) {
            if (!isset($_SESSION['transactions'])) {

                unset($_SESSION['transactions']);
                echo "window.history.go(-1);";
            }
            if (isset($_SESSION['transactions']['status'])) {

                unset($_SESSION['transactions']);
                header("location: ../user/transactions.php");
                exit();
            }

            return true;
        }
    }

    public static function notValidCheck()
    {
        session_destroy();

        header("location: ../auth/home.php");
        exit();
    }
}
