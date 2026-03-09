<?php
header("Content-Type: application/json");

include_once("../config/Database.php");
include_once("../models/User.php");

$db = (new Database())->connect();
$user = new User($db);

$data = json_decode(file_get_contents("php://input"));

$result = $user->login($data->email, $data->password);

if($result){
    echo json_encode([
        "status"=>"success",
        "user"=>$result
    ]);
}else{
    echo json_encode([
        "status"=>"error",
        "message"=>"Invalid credentials"
    ]);
}
?>