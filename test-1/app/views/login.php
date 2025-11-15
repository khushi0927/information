<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="POST" action="index.php?controller=auth&action=login">
        
        <p>
        Enter Your Email: <input type="email" name="email" required />
        </p>
        <p>
           Enter Your password: <input type="password" name="password" required/>
        </p>
        <p>
            <input type="submit" value="Login" />
        </p>
    </form>
    <p >
                Don't have an account?
                <a href="index.php?controller=auth&action=registerPage">Register</a>
            </p>
</body>
</html>