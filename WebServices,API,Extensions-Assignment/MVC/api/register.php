<?php
header("Content-Type: application/json");

include_once("../config/Database.php");
include_once("../models/User.php");

$db = (new Database())->connect();
$user = new User($db);

$data = json_decode(file_get_contents("php://input"));

if($user->register($data->name, $data->email, $data->password)){
    echo json_encode(["status"=>"success","message"=>"User registered"]);
}else{
    echo json_encode(["status"=>"error","message"=>"Registration failed"]);
}
?>