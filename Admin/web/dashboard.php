<?php
if (!isset($_SESSION['id'])) {
    header("Location: index.php?controller=auth&action=index");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="js/script.js"></script>
       <script src="main.js"></script>
</head>
<body class="bg-light">
<div class="container mt-5 text-center">
    <h3>Welcome, <?= htmlspecialchars($_SESSION['Username']); ?> 🎉</h3>
    <p>Your email: <?= htmlspecialchars($_SESSION['Email']); ?></p>
    <a href="index.php?controller=auth&action=logout" class="btn btn-danger mt-3">Logout</a>
</div>
</body>
</html>