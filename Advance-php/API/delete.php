<<<<<<< HEAD
<?php

 include ("config.php");

$id=$_POST["id"];

$sql="delete from students where id='$id'";

if(mysqli_query($con,$sql))
{
    echo "deleted successfully";
}
else
{
    echo "something went wrong";
}
=======
<?php

 include ("config.php");

$id=$_POST["id"];

$sql="delete from students where id='$id'";

if(mysqli_query($con,$sql))
{
    echo "deleted successfully";
}
else
{
    echo "something went wrong";
}
>>>>>>> 3d7a8e84d0b5b2bab93b45629bd2d62ccb481133
?>