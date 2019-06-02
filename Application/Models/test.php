<?php

include_once 'TasksModel.php';

$var=new \Models\TasksModel('tasks');
print_r($var->numberOfCompletedTasks());