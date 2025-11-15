<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../app/views/style/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="POST" action="index.php?controller=auth&action=login">
    <div class="form-card">
  <!-- <h2>Create account</h2> -->
  <p class="lead">Login Form</p>
        <p>
        <form id="regForm" novalidate>
                <div class="form-row">
        Enter Your Email: <input type="email" name="email" class="input" required />
        </p>
        <p>
           Enter Your password: <input type="password" name="password" class="input" minlength="10" required/>
        </p>
        <p>
        <div id="pwHelp" class="helper"></div>
    </div>

            <input type="submit" class="btn" value="Login" />
        </p>
    </form>
    <p >
                Don't have an account?
                <a href="index.php?controller=auth&action=registerPage">Register</a>
            </p>
            <script src="../app/views/js/script.js"></script>
</body>
</html>