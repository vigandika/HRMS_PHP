<?php
namespace Controllers;
class AddtaskController{
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
        $departmentName=$_SESSION['departmentName'];

        $department=new \Models\DepartmentsModel('departments');
        $deptId=$department->getDepartmentId($departmentName);

        $tasktitle=$_POST['title'];
        $duedate=$_POST['duedate'];
        $bonuses=$_POST['bonuses'];
        $fields=[
            'task_title'=>$tasktitle,
            'date_created'=>date("Y-m-d"),
            'due_date'=>$duedate,
            'bonuses'=>$bonuses,
            'department_id'=>$deptId[0]['department_id']
        ];


        $task=new \Models\TasksModel('tasks');
        $uncompletedTasks=$task->getToBeCompleted($departmentName);
        $completedTasks=$task->getCompleted($departmentName);
        $task->insert($fields);
        session_destroy();
        $args=['user'=>$user,'numberOfEmployees'=>$numberOfEmployees,'numberOfCompletedTasks'=>$numberOfCompletedTasks,
            'numberOfRequests'=>$numberOfRequests,'toBeCompletedTasks'=>$uncompletedTasks,'completedTasks'=>$completedTasks];

        return \ViewHelper::render("tasks",$args);


    }
}