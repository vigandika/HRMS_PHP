<?php

spl_autoload_register(function ($className) {
    $file = '/Classes/' . $className . '.php';
    if (file_exists($file))
        include_once $file;
});
?>
