<?php

include 'autoinclude.php';

$model=new RequestsModel('requests');

$param=[
    'request_title'=>'guess'
];
$model->insert($param);
echo "success";

