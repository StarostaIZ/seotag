<?php

class SeoTag
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $parameters;

    /**
     * @var string
     */
    public $head_title;

    /**
     * @var string
     */
    public $head_description;

    /**
     * @var bool
     */
    public $set_canonical = false;

    /**
     * @var string
     */
    public $body_h1;

    /**
     * @var string
     */
    public $body_description;

    /**
     * @var string
     */
    public $custom_url;

    public function __construct(string $parameters = '')
    {
        if(!empty($parameters)){
            $conn = DatabaseConnSingleton::getInstance();
			try {
				$seo = $conn->findSeoTagByParams($parameters);
				foreach (get_object_vars($seo) as $key => $value){
					$this->{$key} = $value;
				}
			} catch (SeoTagNotExistException $e) {
			}

        }

    }

    public function hasRecord()
    {
        return isset($this->id);
    }
    /**
     * @return string
     */
    public function getHeadTitle(): string
    {
        return $this->head_title;
    }

    /**
     * @param string $head_title
     */
    public function setHeadTitle(string $head_title): void
    {
        $this->head_title = $head_title;
    }

    /**
     * @return string
     */
    public function getHeadDescription(): string
    {
        return $this->head_description;
    }

    /**
     * @param string $head_description
     */
    public function setHeadDescription(string $head_description): void
    {
        $this->head_description = $head_description;
    }

    /**
     * @return string
     */
    public function getBodyH1(): string
    {
        return $this->body_h1;
    }

    /**
     * @param string $body_h1
     */
    public function setBodyH1(string $body_h1): void
    {
        $this->body_h1 = $body_h1;
    }

    /**
     * @return string
     */
    public function getBodyDescription(): string
    {
        return $this->body_description;
    }

    /**
     * @param string $body_description
     */
    public function setBodyDescription(string $body_description): void
    {
        $this->body_description = $body_description;
    }

    public function setCanonicalOnMyself()
    {
        $this->set_canonical = true;
    }





}