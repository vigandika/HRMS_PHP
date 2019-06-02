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

        $request = new \Models\RequestsModel('requests_made');

        $numberOfEmployees=$_SESSION['numberOfEmployees'];
        $numberOfCompletedTasks=$_SESSION['numberOfCompletedTasks'];
        $numberOfRequests=$_SESSION['numberOfRequests'];
        $user=$_SESSION['user'];
        $departmentName = $_SESSION['departmentName'];

        $pendingRequests = $request ->getUnApprovedByDepartment($departmentName);


        $args=['user'=>$user,'numberOfEmployees'=>$numberOfEmployees,'numberOfCompletedTasks'=>$numberOfCompletedTasks,
            'numberOfRequests'=>$numberOfRequests, 'pendingRequests' => $pendingRequests];

        return \ViewHelper::render("requests",$args);


    }
}