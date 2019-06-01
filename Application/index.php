<?php
require_once "autoinclude.php";

if (isset($_SERVER['PATH_INFO'])) {
    $path = $_SERVER['PATH_INFO'];
    $pathSplit = explode('/', ltrim($path, '/'));
} else {
    $pathSplit = '/';
}

if ($pathSplit === '/') {

    $controllerObj = new Controllers\DefaultController();

    $method = "index";

    print $controllerObj->$method();


} else {
    $controllerName = "Controllers\\" . $pathSplit[0] . "Controller";

    if ($pathSplit[1] != "") {
        $req_method = "$pathSplit[1]";
    } else {
        $req_method = "index";
    }

    $controllerObj = new $controllerName();

    print $controllerObj->$req_method();

}
?>
