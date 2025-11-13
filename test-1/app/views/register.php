<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form method="POST" action="index.php?controller=auth&action=register">
        <p>
           Enter your First_name: <input type="text" name="first_name" />
        </p>
        <p>
        Enter your Email: <input type="email" name="email" />
        </p>
        <p>
           Enter your password: <input type="password" name="password" />
        </p>
         <p>
           Enter your confirm_password: <input type="password" name="confirm_password" />
        </p>
        <p>
            <input type="submit" value="Register" />
        </p>
    </form>
     <p >
                Don't have an account?
                <a href="index.php?controller=auth&action=login">Login</a>
            </p>
</body>
</html>