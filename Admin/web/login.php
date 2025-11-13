<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width: 450px;">
    <div class="card shadow">
        <div class="card-body">
            <h3 class="text-center mb-4">Login</h3>

          

            <form method="POST" action="index.php?controller=auth&action=login">
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="Email" required class="form-control">
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="Password" required class="form-control">
                </div>
                <button class="btn btn-primary w-100">Login</button>
            </form>

            <p class="text-center mt-3">
                Don't have an account?
                <a href="index.php?controller=auth&action=registerPage">Register</a>
            </p>
        </div>
    </div>
</div>
</body>
</html>
