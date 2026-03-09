<?php
header("Content-Type: application/json");

include_once("../config/Database.php");
include_once("../models/Product.php");

$db = (new Database())->connect();
$product = new Product($db);

if($_SERVER['REQUEST_METHOD'] == "GET"){
    echo json_encode([
        "status"=>"success",
        "data"=>$product->getAll()
    ]);
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $data = json_decode(file_get_contents("php://input"));
    if($product->create($data->name,$data->description,$data->price,$data->stock)){
        echo json_encode(["status"=>"success","message"=>"Product created"]);
    }else{
        echo json_encode(["status"=>"error"]);
    }
}
?>