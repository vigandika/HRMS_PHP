<?php
include_once 'dbconfig.php';
//Klasa osht singleton dmth e ka veq nje objekt
class DB{

    private static $instance;
    private $pdo;
    private $query;
    private $result;
    private $count=0;
    private $lastInsertedId=null;

    private function __construct(){
        try{
            $this->pdo=new PDO('mysql:host='.DBHOST.';dbname='.DBNAME,DBUSER,DBPASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $ex){
            die($ex->getMessage());
        }
    }
    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance=new DB();
        }
        return self::$instance;
    }
}