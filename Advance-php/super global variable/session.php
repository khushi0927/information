<?php

session_start();
date_default_timezone_set("Asia/Kolkata");
$_SESSION['name']="khushi";
setcookie("user","khushi",time()+86400);
echo "welcome ". $_SESSION['name'];

?>