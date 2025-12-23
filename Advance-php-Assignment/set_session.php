<?php
session_start();

$_SESSION["username"] = "Khushi";
$_SESSION["email"] = "khushi@gmail.com";

setcookie("user", "Khushi", time() + 3600);

echo "Session and Cookie are set";
?>
