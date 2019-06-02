<?php
namespace Controllers;
class OverviewController{
    public function index() {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $employee=new \Models\EmployeesModel('employees');
        $manager=new \Models\ManagersModel('managers');

        if($employee->isUser($username,$password)){
            return \ViewHelper::render("e_dashboard",$employee->findByUsername($username));
        }else if($manager->isUser($username,$password)){
            return \ViewHelper::render("overview");
        }else{
            return \ViewHelper::render("login");
        }
    }
}