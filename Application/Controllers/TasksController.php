<?php
namespace Controllers;
class TasksController{
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
        $departmentName=$_SESSION[]

        $task=new \Models\TasksModel('tasks');
        $uncompletedTasks=$task->getToBeCompleted($)

        $args=['user'=>$user,'numberOfEmployees'=>$numberOfEmployees,'numberOfCompletedTasks'=>$numberOfCompletedTasks,
            'numberOfRequests'=>$numberOfRequests];

        return \ViewHelper::render("tasks",$args);
    }
}