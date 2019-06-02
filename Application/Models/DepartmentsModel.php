<?php
namespace Models;
include_once 'BaseModel.php';
class DepartmentsModel extends BaseModel{

    public function getDepartmentsNames(){
        $sql="SELECT department_name FROM departments";
        $this->adapter->runQuery($sql);
        return $this->adapter->results();
    }

    public function getBudget($deptName){
        $sql="SELECT budget FROM departments WHERE department_name=?";
        $param=[$deptName];
        $this->adapter->runQuery($sql,$param);
        return $this->adapter->results();
    }
    
}