<?php
include_once "database.php";
include_once "login.php";

$db = new Database();
$login = new LoginSystem($db);

$login->checkRememberMe();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $password = $_POST['password'] ?? '';
    $rememberMe = isset($_POST['rememberme']);

    if ($login->login($name, $password, $rememberMe)) {
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid name/email or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h2>Login</h2>
<form method="POST" action="">
name or Email: <input type="text" namename" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    Remember Me: <input type="checkbox" name="rememberme"><br><br>
    <input type="submit" value="Login">
</form>
<?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</body>
</html>
