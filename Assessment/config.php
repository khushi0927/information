<?php

$ser="localhost";
$user="root";
$pass="";
$db="appoinment";

$con=new mysqli($ser,$user,$pass,$db);

if(!$con)
{
    echo"Connection successfully";
}
else
{
    die(mysqli_errno($con));
}

?>
