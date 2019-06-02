<?php
namespace Controllers;
class RequestsController{
    public function index(){
        session_start();
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
        }else{
            return \ViewHelper::render("login");
        }

        return \ViewHelper::render("requests");
    }
}