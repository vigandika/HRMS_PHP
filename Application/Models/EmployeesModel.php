<?php
include_once 'autoinclude.php';
class EmployeesModel extends BaseModel{

    public function getByDepartment($deptName){
        $sql="SELECT name FROM $this->tableName NATURAL JOIN departments WHERE department_name=?";
        $param=[$deptName];
        $this->adapter->runQuery($sql,$param);
        return $this->adapter->results();
    }

    public function findByUsername($username){
        $sql="SELECT * from $this->tableName WHERE username=?";
        $param=[$username];
        $this->adapter->runQuery($sql,$param);
        return $this->adapter->results();
    }

}