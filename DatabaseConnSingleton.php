<?php

include_once 'env.php';
include_once 'Model\SeoTag.php';
class DatabaseConnSingleton
{

    private static $instance;


    /**
     * @var mysqli
     */
    public $conn;

    private function __construct(){
        $this->conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    }

    private function __wakeup(){}

    private function __clone(){}

    public static function getInstance()
    {
        if(self::$instance === null){
            self::$instance = new DatabaseConnSingleton();
        }
        return self::$instance;
    }

    /**
     * @return SeoTag[]
     */
    public function getAllSeoTags(): array {
        $response = $this->conn->query("SELECT * FROM seotags");
        $seoTagsArray = [];
        while ($seoTag = $response->fetch_object(SeoTag::class)){
            $seoTagsArray[] = $seoTag;
        }

        return $seoTagsArray;
    }

    public function findSeoTagByParams(string $params):?SeoTag{
        $response = $this->conn->query("SELECT * FROM seotags WHERE parameters = $params");
        $seoTag = null;
        if($response->num_rows==1){
            $seoTag = $response->fetch_object(SeoTag::class);
        }
        return $seoTag;
    }

    /**
     * @return object|stdClass
     * @throws PromoNotExistException
     */
    public function getCurrentPromo(){
        $currentDate = date('Y-m-d');
        $response = $this->conn->query("SELECT * FROM promostop where start_at<=$currentDate and end_at>=$currentDate");
        if($response->num_rows>0){
            $promo = $response->fetch_object(PromoTopBar::class);
        }
        else{
            $defaultResponse = $this->conn->query("SELECT * FROM promostop where `default` =true");
            if($defaultResponse->num_rows>0){
                $promo = $defaultResponse->fetch_object(PromoTopBar::class);
            }
            else{
                throw new PromoNotExistException();
            }
        }
        return $promo;
    }
}