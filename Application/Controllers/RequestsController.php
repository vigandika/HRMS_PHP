<?php
namespace Controllers;
class RequestsController{
    public function index(){
        return \ViewHelper::render("requests");
    }
}