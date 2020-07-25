<?php
namespace trees;
class Tree{
    private $id;
    private $name;
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function __construct($arguments){
        if(isset($arguments['id'])){
            $this->setId($arguments['id']);
        }
        if(isset($arguments['name'])){
            $this->setName($arguments['name']);
        }
    }
    public static function findAll(){
    	\o\DbEngine::getDbEngine ( array (
    			'host' => Configuration::DB_HOST,
    			'name' => Configuration::DB_NAME,
    			'user' => Configuration::DB_USER,
    			'password' => Configuration::DB_PASS
    	) );
    	\o\DbEngine::queryDatabase(
    			array(
    					'queryString'=>'SELECT id, name FROM trees'
    			));
    	return \o\DbEngine::getRecords();

    }
}