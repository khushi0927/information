<?php
include_once "database.php";
include_once "login.php";

$db = new Database();
$login = new LoginSystem($db);
$login->logout();

header("Location: login_form.php");
exit;
?>
