<?php
$conn = new mysqli("localhost", "root", "", "user");

include "controller/UserController.php";

$controller = new UserController($conn);
$users = $controller->handleRequest();

include "view/user_view.php";
?>
