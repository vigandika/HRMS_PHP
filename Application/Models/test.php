<?php

include_once 'EmployeesModel.php';

$var=new \Models\EmployeesModel('employees');
print_r($var->employeesCount('Human Resources'));