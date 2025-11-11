<?php
session_start();
$Controller = isset($_GET['Controller']) ? $_GET['Controller'] : 'Auth';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controllerName = ucfirst($Controller) . 'Controller';
$ControllerFile = "class/AuthController.php";

if (file_exists($ControllerFile)) 
    {
    require $ControllerFile;
    $controllerObj = new $controllerName();

    if (method_exists($controllerObj, $action)) {
        $controllerObj->$action();
    } else {
        echo "Action not found!";
    }
} else {
    echo "Controller not found!";
}
?>
