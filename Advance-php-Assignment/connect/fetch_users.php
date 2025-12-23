<?php

include_once "Database.php";

$db = new Database();

$users = $db->select("SELECT * FROM users");

if ($users) {
    foreach ($users as $user) {
        echo "ID: " . $user['id'] . " | Name: " . $user['name'] . " | Email: " . $user['email'] . "<br>";
    }
} else {
    echo "No users found or query error.";
}

$db->close();
?>
