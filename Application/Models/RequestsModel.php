<?php
include "autoinclude.php";

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

    }

    public function getApprovedByDepartment($deptName){

    }
}