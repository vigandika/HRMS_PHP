<?php
namespace Models;
include_once 'DB.php';
class BaseModel{
    protected $adapter;
    protected $tableName;
    protected $columnNames=[];
    protected $primaryKey;

    public function __construct($tableName){
       $this->adapter=\DB::getInstance();
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

    public function insert($fields=array()){
        $fieldString='';
        $fieldValue='';
        $values=array();
        foreach ($fields as $field=>$value){
            $fieldString.='`'.$field.'`,';
            $fieldValue.='?,';
            $values[]=$value;
        }
        $fieldString=rtrim($fieldString,',');
        $fieldValue=rtrim($fieldValue,',');

        $sql="INSERT INTO $this->tableName ({$fieldString}) VALUES ({$fieldValue})";
        $this->adapter->runQuery($sql,$values);
    }

    public function update($id,$fields=array()){
        $fieldString='';
        $values=[];
        foreach($fields as $field=>$value){
            $fieldString.=' '.$field.'=?,';
            $values[]=$value;
        }
        $fieldString=trim($fieldString);
        $fieldString=rtrim($fieldString,',');
        $sql="UPDATE {$this->tableName} SET {$fieldString} WHERE {$this->getPrimaryKey()}={$id}";
        $this->adapter->runQuery($sql,$values);
    }

    public function delete($id){
        $sql="DELETE FROM $this->tableName WHERE {$this->getPrimaryKey()} =?";
        $param=[$id];
        if($this->adapter->runQuery($sql,$param)){
            return true;
        }
        else{
            return false;
        }
    }
}