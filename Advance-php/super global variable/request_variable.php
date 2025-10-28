<form method="post">
    <input type="text" name="username" >
    <input type="submit" value="Submit">
</form>

<?php

$name = $_REQUEST['username'];
echo "Hello". $name;
?>