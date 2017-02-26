<?php

/**
 * Class to handle articles
 */
class Article
{
    // Properties

    /**
     * @var int The article ID from the database
     */
    public $id = null;

    /**
     * @var int When the article was published
     */
    public $publicationDate = null;

    /**
     * @var string Full title of the article
     */
    public $title = null;

    /**
     * @var string A short summary of the article
     */
    public $summary = null;

    /**
     * @var string The HTML content of the article
     */
    public $content = null;


    /**
     * Sets the object's properties using the values in the supplied array
     *
     * @param array $data
     */
    public function __construct($data=array())
    {
        if(isset($data['id'])) $this->id = (int) $data['id'];
        if(isset($data['publicationDate'])) $this->publicationDate = (int) $data['publicationDate'];
        if(isset($data['title'])) $this->title =preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['title']);
        if(isset($data['summary'])) $this->summary =preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['summary']);
        if(isset($data['content'])) $this->content = (int) $data['content'];
    }

    /**
     * set properties using post form values in an array
     * @param array $params
     */
    public function storeFormValues($params){
        //store all parameters
        $this->__construct($params);

        //publication date parse
        if (isset($params['publicationDate'])){
            $publicationDate = explode('-',$params['publicationDate']);
            if (count($publicationDate)==3){
                list($y,$m,$d) = $publicationDate;
                $this->publicationDate = mktime(0,0,0,$m,$d,$y);
            }
        }

    }

}