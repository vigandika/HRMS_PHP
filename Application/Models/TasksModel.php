<?php
namespace Models;
include_once 'BaseModel.php';
class TasksModel extends BaseModel{

    public function getByDepartment($deptName){
        $sql="SELECT task_title,date_created, bonuses FROM $this->tableName NATURAL JOIN departments WHERE department_name=? ";
        $param=[$deptName];
        $this->adapter->runQuery($sql,$param);
        return $this->adapter->results();
    }

    public function getCompleted($deptName){
        $sql="SELECT *FROM $this->tableName NATURAL  JOIN departments WHERE  department_name=? AND emp_id IS NOT NULL";
        $param=[$deptName];
        $this->adapter->runQuery($sql,$param);
        return $this->adapter->results();
    }

    public function getToBeCompleted($deptName){
        $sql="SELECT *FROM $this->tableName NATURAL  JOIN departments WHERE  department_name=? AND emp_id IS  NULL";
        $param=[$deptName];
        $this->adapter->runQuery($sql,$param);
        return $this->adapter->results();
    }

    public function numberOfCompletedTasks($deptName){
        $this->getByDepartment($deptName);
        return $this->adapter->count();
    }

}