<?php
namespace Controllers;
class EmployeesController{
    public function index(){
        session_start();
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
        }else{
            return \ViewHelper::render("login");
        }


        $numberOfEmployees=$_SESSION['numberOfEmployees'];
        $numberOfCompletedTasks=$_SESSION['numberOfCompletedTasks'];
        $numberOfRequests=$_SESSION['numberOfRequests'];
        $user=$_SESSION['user'];
        $departmentName=$_SESSION['departmentName'];

        $employe=new \Models\EmployeesModel('employees');

        $employeStats=$employe->getByJob($departmentName);

        $args=['user'=>$user,'numberOfEmployees'=>$numberOfEmployees,'numberOfCompletedTasks'=>$numberOfCompletedTasks,
            'numberOfRequests'=>$numberOfRequests,'employeeStats'=>$employeStats];

        return \ViewHelper::render("employees",$args);
    }
}