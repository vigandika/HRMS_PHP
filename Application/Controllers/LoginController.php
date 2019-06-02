<?php
namespace Controllers;
class LoginController{
    public function index(){
        return \ViewHelper::render("login");
    }
}