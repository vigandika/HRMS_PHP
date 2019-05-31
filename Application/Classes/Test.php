<?php

include_once 'autoinclude.php';

$adapter=DB::getInstance();
$sql="SELECT * FROM employees WHERE username=?";
$param=['bledarbuza'];
$adapter->runQuery($sql,$param);

foreach ($adapter->results() as $result){
    echo $result['name'];
}

