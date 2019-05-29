<?php

class DatabaseAdapterPDO implements DatabaseAdapterInterface {

    private $pdo;
    private $lastStatemnt=null;

    function setConnectionInfo($values = array()){
        $connString=$values[0];
        $user=$values[1];
        $password=$values[2];

        $pdo=new PDO($connString,$user,$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        this->pdo=$pdo;
    }

    public function closeConnection(){
        if (this->pdo!=null){
            this->pdo=null;
        }
    }

    public function runQuery($sql,$paramters=array()){
        if(!is_array($paramters)){
            $parameters=array($parameters);
        }

        $this->lastStatemnt=null;
        if(count($parameters)>0){
            $this->lastStatemnt=$this->pdo->prepare($sql);
            $executedOk=$this->lastStatemnt->execute($parameters);
            if(!$executedOk){
                throw new PDOException;
            }
        }else{
            $this->lastStatemnt=$this->pdo->query($sql);
            if(!$this->lastStatemnt){
                throw new PDOException;
            }
        }
        return $this->lastStatemnt;
    }

    public function runQuery($sql, $parameters = array()){

    }


}