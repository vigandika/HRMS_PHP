<?php
namespace Controllers;
class TasksController{
    public function index(){
        return \ViewHelper::render("tasks");
    }
}