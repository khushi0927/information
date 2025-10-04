<?php

 include ("config.php");

$id=$_POST["id"];

$sql="delete from students where id='$id'";

if(mysqli_query($con,$sql))
{
    echo "deleted successfully";
}
else
{
    echo "something went wrong";
}
?>