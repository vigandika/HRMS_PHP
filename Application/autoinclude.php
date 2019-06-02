<?php

spl_autoload_register(function($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    include_once $_SERVER['DOCUMENT_ROOT'] . '/projekti/Project_Gr35_ProgramimiNeInternet/Application/' . $className . '.php';
});