<?php
namespace Controllers;
class EmployeesSuggestController{
    public function index(){
        session_start();
        $user=$_SESSION['user'];
        $departmentName=$_SESSION['departmentName'];
        $param=$_REQUEST['q'];

        $employee=new \Models\EmployeesModel('employees');
        $results=$employee->getSuggestions($param,$departmentName);

        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Job Title</th>";
        echo "<th>Joined On</th>";
        echo "<th>Salary</th>";
        echo "<th>Bonuses</th>";
        echo "<tr>";
        foreach ($results as $result) {
            echo "<tr>";
            echo "<td>".$result['name']."</td>";
            echo "<td>".$result['job_title']."</td>";
            echo "<td>".$result['start_date']."</td>";
            echo "<td>".$result['salary']."</td>";
            echo "<td>".$result['bonuses']."</td>";
            echo "<tr>";
        }




    }
}
