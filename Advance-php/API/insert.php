<<<<<<< HEAD
<?php

include ("config.php");

$name=$_POST["name"];
$surname=$_POST["surname"];
$email=$_POST["email"];
$gender=$_POST["gender"];
$password=$_POST["password"];
 
if($name=="" && $surname=="" && $email=="" && $gender=="" && $password=="")
{
    echo "0";
}
else
{
    $sql="insert into students(name,surname,email,gender,password)value ('$name','$surname','$email','$gender','$password')";
    mysqli_query($con,$sql);
    mysqli_close($con);
}
=======
<?php

include ("config.php");

$name=$_POST["name"];
$surname=$_POST["surname"];
$email=$_POST["email"];
$gender=$_POST["gender"];
$password=$_POST["password"];
 
if($name=="" && $surname=="" && $email=="" && $gender=="" && $password=="")
{
    echo "0";
}
else
{
    $sql="insert into students(name,surname,email,gender,password)value ('$name','$surname','$email','$gender','$password')";
    mysqli_query($con,$sql);
    mysqli_close($con);
}
>>>>>>> 3d7a8e84d0b5b2bab93b45629bd2d62ccb481133
?>