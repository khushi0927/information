<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../app/views/style/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form method="POST" action="index.php?controller=auth&action=register">
    <h2 align="center" >Create account</h2>
    <div class="form-card">
  <p class="lead">Register Form</p>
        <p>
              <form id="regForm" novalidate>
                <div class="form-row">
           Enter Your First_name: <input type="text" name="first_name" class="input" required />
        </p>
        <p>
        Enter Your Email: <input type="email" name="email" class="input" required />
        </p>
        <p>
           Enter Your password: <input type="password" name="password" minlength="10" class="input" required/>
        </p>
         <p>
           Enter Your confirm_password: <input type="password" name="confirm_password" minlength="10" class="input" required/>
        </p>
        <div id="pwHelp" class="helper"></div>
    </div>

        <p>
            <input type="submit" class="btn" value="Register" />
        </p>
    </form>
</div> 
            <p >
                Don't have an account?
                <a href="index.php?controller=auth&action=login">Login</a>
            </p>
            <script src="../app/views/js/script.js"></script>
</body>
</html>