<?php
include_once 'dbconfig.php';

class DB{

    private static $instance;
    private $pdo;
    private $query;
    private $result;
    private $count=0;
    private $lastInsertedId=null;
    private $error=false;

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

    public function runQuery($sql,$parameters=array()){
        $this->error=false;
        if($this->query=$this->pdo->prepare($sql)){
            $i=1;
            if(count($parameters)){
                foreach($parameters as $parameter) {
                    $this->query->bindValue($i, $parameter);
                    $i++;
                }
            }

            if($this->query->execute()){
                try {
                    $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);
                    $this->count = $this->query->rowCount();
                    $this->lastInsertedId = $this->pdo->lastInsertId();
                }catch (PDOException $exception){
                    $exception->getTrace();
                }
            }else{
                $this->error=true;
            }

        }
        return $this;
    }

    public function first(){
        return (!empty($this->result))? $this->result[0]:[];
    }

    public function results(){
        return $this->result;
    }

    public function count(){
        return $this->count;
    }

    public function lastId(){
        return $this->lastInsertedId;
    }

    public function getColumns($table){
        return $this->runQuery("SHOW COLUMNS FROM {$table}");
    }

    public function error(){
        return $this->error;
    }
}