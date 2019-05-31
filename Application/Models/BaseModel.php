<?php
include_once '../Classes/DB.php';

class BaseModel{
    protected $adapter;
    protected $tableName;
    protected $columnNames=[];
    protected $primaryKey;

    public function __construct($tableName){
       $this->adapter=DB::getInstance();
       $this->tableName=$tableName;
    }

    public function getColumnNames(){
        $sql="SHOW COLUMNS FROM $this->tableName";
        $this->adapter->runQuery($sql);
        foreach ($this->adapter->results() as $var){
            $this->columnNames[]=$var['Field'];
        }
        return $this->columnNames;
    }

    public function getPrimaryKey(){
        $sql="SHOW KEYS FROM $this->tableName WHERE Key_name = 'PRIMARY'";
        $this->adapter->runQuery($sql);
        $this->primaryKey=$this->adapter->results()[0]['Column_name'];
        return $this->primaryKey;
    }
}