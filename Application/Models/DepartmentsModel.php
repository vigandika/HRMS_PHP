<?php
include 'autoinclude.php';

class DepartmentsModel extends BaseModel{

    public function getDepartmentsNames(){
        $sql="SELECT department_name FROM departments";
        $this->adapter->runQuery($sql);
        return $this->adapter->results();
    }
    
}