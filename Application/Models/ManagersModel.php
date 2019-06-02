<?php
include 'autoinclude.php';

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

    public function getByDepartment($deptName){
        $sql="SELECT name FROM $this->tableName NATURAL JOIN departments WHERE department_name=?";
        $param=[$deptName];
        $this->adapter->runQuery($sql,$param);
        return $this->adapter->results();
    }


}