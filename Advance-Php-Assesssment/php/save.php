<?php
include "TaskLog.php";

$data = json_decode(file_get_contents("php://input"), true);

$taskLog = new TaskLog();
$taskLog->saveTask(
    $data['task'],
    $data['description'],
    $data['duration'],
    $data['date']
);

echo json_encode(["status" => "success"]);
