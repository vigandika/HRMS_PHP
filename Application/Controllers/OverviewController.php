<?php
namespace Controllers;

class OverviewController{
    public function index() {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $employee=new \Models\EmployeesModel('employees');
        $manager=new \Models\ManagersModel('managers');
        $department=new \Models\DepartmentsModel('departments');

        if($employee->isUser($username,$password)){
            return \ViewHelper::render("e_dashboard");
        }else if($manager->isUser($username,$password)){

            $departmentName=$manager->getDepartment($username)[0]['department_name'];
            $employees=$employee->getByDepartment($departmentName);
            $budget=$department->getBudget($departmentName);
            $args=['department'=>$department,'employees'=>$employees,"budget"=>$budget];

            return \ViewHelper::render("overview",$args);
        }else{
            $error=[true];
            return \ViewHelper::render("login",$error);
        }
    }
}