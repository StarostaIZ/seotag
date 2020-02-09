<?php

class DatabaseConnSingleton
{

    private static $instance;


    /**
     * @var mysqli
     */
    private $conn;

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
        $result = $this->conn->query("SELECT * FROM seotags");
        $seoTagsArray = [];
        while ($seoTag = $result->fetch_object(SeoTag::class)){
            $seoTagsArray[] = $seoTag;
        }

        return $seoTagsArray;
    }

    public function getAllPromos(): array {
    	$result = $this->conn->query("SELECT * FROM promostop");
    	$promosArray = [];
    	while($promo = $result->fetch_object(PromoTopBar::class)){
    		$promosArray[] = $promo;
		}

		return $promosArray;
	}

	/**
	 * @param string $params
	 * @return SeoTag|null
	 * @throws SeoTagNotExistException
	 */
    public function findSeoTagByParams(string $params):?SeoTag{
        $result = $this->conn->query("SELECT * FROM seotags WHERE parameters = '$params'");
        $seoTag = null;
        if($result){
            $seoTag = $result->fetch_object(SeoTag::class);
        }else{
        	throw new SeoTagNotExistException();
		}
        return $seoTag;
    }

    /**
     * @return object|stdClass
     * @throws PromoNotExistException
     */
    public function getCurrentPromo(){
        $currentDate = date('Y-m-d');
        $result = $this->conn->query("SELECT * FROM promostop where start_at<='$currentDate' and end_at>='$currentDate'");
		if($result->num_rows>0){
            $promo = $result->fetch_object(PromoTopBar::class);
        }
        else{
            $defaultResult = $this->conn->query("SELECT * FROM promostop where `default` =true");
            if($defaultResult->num_rows>0){
                $promo = $defaultResult->fetch_object(PromoTopBar::class);
            }
            else{
                throw new PromoNotExistException();
            }
        }
        return $promo;
    }
    
    public function updateSeoTag($id, $columnName, $value){
    	$this->conn->query("UPDATE seotags SET $columnName = '$value' WHERE id = '$id'");
	}

	public function updatePromo($id, $columnName, $value){
		$this->conn->query("UPDATE promostop SET `$columnName` = '$value' WHERE id = '$id'");
	}
	public function addSeoTag(SeoTag $seoTag): bool
	{
		return $this->conn->query("INSERT INTO seotags(`parameters`, `head_title`, `head_description`, `set_canonical`, `body_h1`, `body_description`, `custom_url`) values ('$seoTag->parameters', '$seoTag->head_title', '$seoTag->head_description', '$seoTag->set_canonical', '$seoTag->body_h1', '$seoTag->body_description', '$seoTag->custom_url')");
	}

	public function addPromo(PromoTopBar $promoTopBar){
    	if($promoTopBar->default){
    		$this->conn->query("UPDATE promostop SET `default` = false");
		}
    	return $this->conn->query("INSERT INTO promostop(`default`, `start_at`, `end_at`, `description`, `link`) values ('$promoTopBar->default', '$promoTopBar->start_at', '$promoTopBar->end_at', '$promoTopBar->description', '$promoTopBar->link')");
    }

	public function setAllDefaultFalse()
	{
		$this->conn->query("UPDATE promostop SET `default` = 0");
	}
}