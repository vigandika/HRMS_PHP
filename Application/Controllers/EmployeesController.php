<?php
namespace Controllers;
class EmployeesController{
    public function index(){
        return \ViewHelper::render("employees");
    }
}