<?php
namespace Controllers;
class LoginController{
    public function index() {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $employee=new \Models\EmployeesModel('employees');
        $manager=new \Models\ManagersModel('managers');

        if($employee->isUser($username,$password)){
            return \ViewHelper::render("overview");
        }else if($manager->isUser($username,$password)){
            return \ViewHelper::render("e_dashboard");
        }else{
            return \ViewHelper::render("login");
        }
    }
}