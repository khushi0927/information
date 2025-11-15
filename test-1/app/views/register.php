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
           Enter Your First_name: <input type="text" name="first_name" required />
        </p>
        <p>
        Enter Your Email: <input type="email" name="email" required />
        </p>
        <p>
           Enter Your password: <input type="password" name="password" required/>
        </p>
         <p>
           Enter Your confirm_password: <input type="password" name="confirm_password" required/>
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