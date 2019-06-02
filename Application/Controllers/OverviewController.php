<?php
namespace Controllers;

class OverviewController{
    public function index() {
        session_start();
        if(isset($_SESSION['username'])){
            $username=$_SESSION['username'];
            $password=$_SESSION['password'];
        }else {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $_SESSION['username']=$username;
            $_SESSION['password']=$password;
        }

        $employee=new \Models\EmployeesModel('employees');
        $manager=new \Models\ManagersModel('managers');
        $department=new \Models\DepartmentsModel('departments');
        $tasks=new \Models\TasksModel('tasks');
        $request=new \Models\RequestsModel('requests_made');


        if($employee->isUser($username,$password)){
            return \ViewHelper::render("e_dashboard");
        }else if($manager->isUser($username,$password)){

            $departmentName=$manager->getDepartment($username)[0]['department_name'];
            $employees=$employee->getByDepartment($departmentName);
            $numberOfEmployees=$employee->employeesCount($departmentName);
            $budget=$department->getBudget($departmentName);
            $numberOfCompletedTasks=$tasks->numberOfCompletedTasks($departmentName);
            $numberOfRequests=$request->getNumberOfUnApprovedRequestsPerDepartment($departmentName);
            $managerName=$manager->getName($username);

            $args=['employees'=>$employees,"budget"=>$budget,"numberOfEmployees"=>$numberOfEmployees,
                'tasks'=>$numberOfCompletedTasks,'requests'=>$numberOfRequests,"user"=>$managerName[0]['name']];

            return \ViewHelper::render("overview",$args);
        }else{
            $error=[true];
            return \ViewHelper::render("login",$error);
        }


    }

}