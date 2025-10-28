<?php

include ("config.php");

$id=$_POST["id"];
$name=$_POST["name"];
$surname=$_POST["surname"];
$email=$_POST["email"];
$gender=$_POST["gender"];
$password=$_POST["password"];

$sql="update students set name='$name',surname='$surname',email='$email',gender='$gender',password='$password' where id='$id'";
//mysqli_query($con,$sql);

if(mysqli_query($con,$sql))
{
    echo "updated successfully";
}
else
{
    echo "something went wrong";
}

?>