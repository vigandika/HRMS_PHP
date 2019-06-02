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

    public function getCompleted(){
        $sql="SELECT *FROM $this->tableName WHERE emp_id IS NOT NULL";
        $this->adapter->runQuery($sql);
        return $this->adapter->results();
    }

    public function numberOfCompletedTasks(){
        $this->getCompleted();
        return $this->adapter->count();
    }

    public function getToBeCompleted(){
        $sql="SELECT *FROM $this->tableName WHERE emp_id IS NULL";
        $this->adapter->runQuery($sql);
        return $this->adapter->results();
    }
}