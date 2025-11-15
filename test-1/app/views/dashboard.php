<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php?controller=auth&action=index");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5 text-center">
    <h3>Welcome, <?= htmlspecialchars($_SESSION['user_name']); ?> 🎉</h3>
    <p>Your email: <?= htmlspecialchars($_SESSION['user_email']); ?></p>
    <a href="index.php?controller=auth&action=logout" class="btn btn-danger mt-3">Logout</a>
</div>
</body>
</html>