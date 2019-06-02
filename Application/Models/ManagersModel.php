<?php
namespace Models;
include_once 'BaseModel.php';
class ManagersModel extends BaseModel{

    public function isUser($username,$password){
        $sql="SELECT * FROM $this->tableName WHERE username=? and password=?";
        $param=[$username,$password];
        $this->adapter->runQuery($sql,$param);
        if($this->adapter->count()==1){
            return true;
        }else{
            return false;
        }
    }

    public function getDepartment($username){
        $sql="SELECT department_name FROM $this->tableName NATURAL JOIN departments WHERE username=?";
        $param=[$username];
        $this->adapter->runQuery($sql,$param);
        return $this->adapter->results();
    }


}