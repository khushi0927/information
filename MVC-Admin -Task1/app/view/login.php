<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <h2>Login</h2>
  <form method="post" action="index.php?controller=auth&action=login">
   
    <label>Email:</label>
    <input type="email" name="email" required><br><br>

    <label>Password:</label>
    <input type="password" name="password" required><br><br>


    <input type="submit" value="Submit">
  </form>
  
     
    <p class="text-center mt-3">
        Don't have an account?
        <a href="index.php?controller=auth&action=registerform">Register</a>
    </p>
</body>
</html>