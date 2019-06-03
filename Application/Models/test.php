<?php

include_once 'EmployeesModel.php';

$var =new \Models\EmployeesModel('employees');

print_r($var->getSuggestions("a",'Head Office'));