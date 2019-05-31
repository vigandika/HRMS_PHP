<?php
include 'autoinclude.php';

class ManagersModel extends BaseModel{

    public function getByDepartment($deptName){
        $sql="SELECT name FROM $this->tableName NATURAL JOIN departments WHERE department_name=?";
        $param=[$deptName];
        $this->adapter->runQuery($sql,$param);
        return $this->adapter->results();
    }
}