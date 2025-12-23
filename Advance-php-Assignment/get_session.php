<?php
session_start();

echo "Username: " . $_SESSION["username"] . "<br>";
echo "Email: " . $_SESSION["email"] . "<br>";

if (isset($_COOKIE["user"])) {
    echo "Cookie User: " . $_COOKIE["user"];
} else {
    echo "Cookie not found";
}
?>
