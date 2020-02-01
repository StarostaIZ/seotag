<?php


class PromoTopBarSingleton
{

    private static $instance;

    /**
     * @var PromoTopBar
     */
    private $promo;

    private function __construct(){}

    private function __wakeup(){}

    private function __clone(){}

    public static function getInstance()
    {
        if(self::$instance === null){
            self::$instance = new PromoTopBarSingleton();
        }
        return self::$instance;
    }

    public function getLink()
    {

    }

    public function getText(){

    }




}