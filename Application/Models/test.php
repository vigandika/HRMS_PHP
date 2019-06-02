<?php

include_once 'DepartmentsModel.php';

$var= new \Models\DepartmentsModel('departments');
print_r($var->getBudget('Head Office'));