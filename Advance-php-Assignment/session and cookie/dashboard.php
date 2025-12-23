<?php
include_once "database.php";
include_once "login.php";

$db = new Database();
$login = new LoginSystem($db);
$login->checkRememberMe();

if (!$login->isLoggedIn()) {
    header("Location: login_form.php");
    exit;
}

echo "<h2>Welcome, " . $_SESSION['name'] . "</h2>";
echo '<a href="logout.php">Logout</a>';
?>
