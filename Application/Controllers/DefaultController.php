<?php
namespace Controllers;

class DefaultController{
    public function index() {
        session_start();
        session_destroy();
        return \ViewHelper::render("login");
    }
}