<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
</head>
<body>
  <h2>Register</h2>
  <form method="post" action="index.php?controller=auth&action=register">
    <label>First Name:</label>
    <input type="text" name="first_name" required><br><br>


    <label>Last Name:</label>
    <input type="text" name="last_name" required><br><br>


    <label>Email:</label>
    <input type="email" name="email" required><br><br>


    <label>Password:</label>
    <input type="password" name="password" required><br><br>


    <label>Gender:</label>
    <input type="radio" name="gender" value="Male"> Male
    <input type="radio" name="gender" value="Female"> Female
    <input type="radio" name="gender" value="Other"> Other<br><br>


    <label>City:</label>
    <select name="city" required>
      <option value="">--Select City--</option>
      <option value="Rajkot">Rajkot</option>
      <option value="Ahmedabad">Ahmedabad</option>
    </select><br><br>

    <input type="submit" value="Submit">
  </form>
  
     <p class="text-center mt-3">
         Already have an account?
         <a href="index.php?controller=auth&action=index">Login</a>
    </p>
</body>
</html>