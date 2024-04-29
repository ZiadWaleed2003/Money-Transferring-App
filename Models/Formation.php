<?php
class Formation
{
    ////////////////////////////// Variables //////////////////////////////
    private $cardNumberPattern = "/\D+/";
    private $amountPattern = "/\D+/";
    
    private $transactionSTATUS = ['accepted', 'rejected'];
    private $transactionTYPE = ['send', 'recieve'];

    private $stringPattern = '/^[a-zA-Z0-9\s\.\,\'\"\:\;\-_]+$/';


    ////////////////////////////// CONSTRUCT //////////////////////////////
    public function __construct()
    {
        $this->cardNumberPattern = "/\D+/";
        $this->amountPattern = "/\D+/";
        $this->stringPattern = '/^[a-zA-Z0-9\s\.\,\'\"\:\;\-_]+$/';
    }


    ////////////////////////////// METHODS //////////////////////////////
    public static function cleanNumber($str){
        return preg_replace(self::$amountPattern, '', $str);
    }
    
    private static function cleanString($string)
    {
        $string = trim($string);
        $string = preg_replace(self::$stringPattern, '', $string);
        return $string;
    }

    public static function capitalizeFirstLetter($string)
    {
        return ucfirst(self::cleanString($string));
    }

    public static function toUpperCase($string)
    {
        return strtoupper(self::cleanString($string));
    }

    public static function toLowerCase($string)
    {
        return strtolower(self::cleanString($string));
    }

    public static function capitalizeWords($string)
    {
        return ucwords(self::cleanString($string));
    }

    public static function cleanCardNumber($card_number)
    {
        $card_number = self::cleanNumber($card_number);
        return intval($card_number);
    }

    public static function cleanAmount($amount)
    {
        $amount = self::cleanNumber($amount);
        return floatval($amount);
    }


    public static function cleanDescription($description)
    {
        $description = self::cleanString($description);
        $description = self::capitalizeFirstLetter($description);
        return $description;
    }

    public static function cleanTransactionStatus($status)
    {
        $status = self::cleanNumber($status);
        return self::$transactionSTATUS[$status] ?? null;
    }

    public static function cleanTransactionType($type)
    {
        $type = self::cleanNumber($type);
        return self::$transactionTYPE[$type] ?? null;
    }

}
