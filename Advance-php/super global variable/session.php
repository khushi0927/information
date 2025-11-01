<<<<<<< HEAD
<?php

session_start();
date_default_timezone_set("Asia/Kolkata");
$_SESSION['name']="khushi";
setcookie("user","khushi",time()+86400);
echo "welcome ". $_SESSION['name'];

=======
<?php

session_start();
date_default_timezone_set("Asia/Kolkata");
$_SESSION['name']="khushi";
setcookie("user","khushi",time()+86400);
echo "welcome ". $_SESSION['name'];

>>>>>>> 3d7a8e84d0b5b2bab93b45629bd2d62ccb481133
?>