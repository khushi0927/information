<?php
$conn = new mysqli("localhost","root","","mvc_comments");

if($conn->connect_error){
    die("Connection Failed");
}
?>