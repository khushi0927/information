<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<title>APPOINMENT</title>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<link rel='stylesheet' type='text/css' media='screen' href='style/style.css'>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src='main.js'></script>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS Bundle (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<!--navigation  -->
<nav class="nav bg-dark p-3 shadow">
<a href="" class="navbar-brand text-white ms-5">Patient appoinment</a>
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="about.php">about</a></li>
<li><a href="#" data-bs-toggle="modal" data-bs-target="#addemp">addpatient</a></li>
<li><a href="index.php"><button type="button" class="btn btn-primary position-relative">
  Manage Appoinment
  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
    <!-- count total employee -->
<?php 
// <!-- fetch data -->
$ser="localhost";
$user="root";
$pass="";
$db="appoinment";
$con=new mysqli($ser,$user,$pass,$db);
$select="select count(id) as total from tbl_patient";
$query=mysqli_query($con,$select); 
$fetch=mysqli_fetch_array($query);
// total count
echo $fetch["total"];
?>
    <span class="visually-hidden">unread messages</span>
  </span>
</button></a></li>

<li><a href="contact.php">contactus</a></li>
</ul>   
</nav>
<?php
require_once("content.php");

?>

</body>
</html>