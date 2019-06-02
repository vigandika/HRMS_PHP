<?php
namespace Models;
include_once 'BaseModel.php';
class RequestsModel extends BaseModel{


    public function getApprovedRequests(){
        $sql="SELECT request_title,duration,request_date FROM $this->tableName NATURAL JOIN requests WHERE APPROVAL='YES'";
        $this->adapter->runQuery($sql);
        return $this->adapter->results();
    }

    public function getUnApprovedRequests(){
        $sql="SELECT request_title,duration,request_date FROM $this->tableName NATURAL JOIN requests WHERE APPROVAL='NO'";
        $this->adapter->runQuery($sql);
        return $this->adapter->results();
    }

    public function getUnApprovedByDepartment($deptName){
        $sql="SELECT name , request_title,request_date FROM requests_made NATURAL JOIN employees NATURAL JOIN departments 
        NATURAL JOIN requests WHERE approval=? AND department_name=?";
        $param=['NO',$deptName];
        $this->adapter->runQuery($sql,$param);
        return $this->adapter->results();
    }

    public function getApprovedByDepartment($deptName){
        $sql="SELECT name , request_title,request_date ,approval_date FROM requests_made NATURAL JOIN employees NATURAL JOIN departments 
        NATURAL JOIN requests WHERE approval=? AND department_name=?";
        $param=['YES',$deptName];
        $this->adapter->runQuery($sql,$param);
        return $this->adapter->results();
    }

    public function getNumberOfUnApprovedRequestsPerDepartment($deptName){
        $this->getUnApprovedByDepartment($deptName);
        return $this->adapter->count();
    }
}