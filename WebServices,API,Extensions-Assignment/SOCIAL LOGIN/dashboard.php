<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: index.php");
}
?>

<h2>Welcome <?= $_SESSION['user']; ?></h2>
<a href="logout.php">Logout</a>