<?php
class Formation
{
    ////////////////////////////// Variables //////////////////////////////
    private static $cardNumberPattern = "/\D+/";
    private static $amountPattern = "/\D+/";
    
    private static $transactionTYPE = ['send', 'recieve'];
    private static $transactionSTATUS = [ 'CANCELLED', 'Done'];
    
    private static $numberPattern = "/\D+/";
    private static $stringPattern = '/^[a-zA-Z0-9\s\.\,\'\"\:\;\-_]+$/';


    ////////////////////////////// CONSTRUCT //////////////////////////////
    public function __construct()
    {
        $this->cardNumberPattern = "/\D/";
        $this->amountPattern = "/\D+/";
        $this->stringPattern = '/^[a-zA-Z0-9\s\.\,\'\"\:\;\-_]+$/';
    }


    ////////////////////////////// METHODS //////////////////////////////
    public static function cleanNumber($str){
        return preg_replace(self::$cardNumberPattern, "", $str);
    }
    
    private static function cleanString($string)
    {
        $string = trim($string);
        $string = preg_replace(self::$stringPattern, "", $string);
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

    public static function cleanIpn($ipns){
        $complete_ipn ="";
        foreach ($ipns as $ipn){
            $complete_ipn .=$ipn;
        }
        var_dump(intval(self::cleanNumber($complete_ipn)));
        echo "<br>";
        return intval(self::cleanNumber($complete_ipn));
    }

    public static function showCardNumber($card_number){
        $show_card_number = substr($card_number,0, 4);
        $show_card_number .= ' ';
        
        for($i = 1; $i <= 8; $i++){
            $show_card_number .= 'x';
            if($i %4 == 0){
                $show_card_number .= ' ';
            }
        }
        $show_card_number .= ' ';
        $show_card_number .= substr($card_number,12, 16);

        return $show_card_number;
    }
}
