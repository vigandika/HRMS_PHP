<?php
include_once '../Classes/DB.php';

class BaseModel{
    protected $adapter;
    protected $tableName='employees';
    protected $columnNames=[];
    protected $primaryKey;

    public function __construct(){
       $this->adapter=DB::getInstance();
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

    public function insert($table,$fields=array()){
        $fieldString='';
        $valueString='';
        $values=array();

        foreach ($fields as $field=>$value){
            $fieldString.='`'.$field.'`,';
            $valueString.='?,';
            $values[]=$value;
        }
        $fieldString=rtrim($fieldString,',');
        $valueString= rtrim($valueString,',');

        $sql="INSERT INTO {$table} ({$fieldString}) VALUES ({$valueString})";
        $this->adapter->runQuery($sql,$values);

    }
}