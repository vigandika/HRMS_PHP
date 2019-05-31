<?php

include 'autoinclude.php';

$model=new BaseModel();
foreach($model->getColumnNames() as $var){
    echo $var."<br>";
}



