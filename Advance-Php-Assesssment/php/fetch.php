<?php
include "tasklog.php";

$taskLog = new tasklog();
$data = file_exists("../data/tasks.json")
    ? json_decode(file_get_contents("../data/tasks.json"), true)
    : [];

echo json_encode($data);
