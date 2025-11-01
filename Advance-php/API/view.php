<<<<<<< HEAD
<?php

include ("config.php");

$sql="select * from students";
$response = array ();
$result=mysqli_query($con,$sql);

while($row=mysqli_fetch_array($result))
{
    $data["id"]=$row["id"];
    $data["name"]=$row["name"];
    $data["surname"]=$row["surname"];       
    $data["email"]=$row["email"];
    $data["gender"]=$row["gender"];
    $data["password"]=$row["password"];

    array_push($response,$data);
}

echo json_encode($response);
mysqli_close($con);

=======
<?php

include ("config.php");

$sql="select * from students";
$response = array ();
$result=mysqli_query($con,$sql);

while($row=mysqli_fetch_array($result))
{
    $data["id"]=$row["id"];
    $data["name"]=$row["name"];
    $data["surname"]=$row["surname"];       
    $data["email"]=$row["email"];
    $data["gender"]=$row["gender"];
    $data["password"]=$row["password"];

    array_push($response,$data);
}

echo json_encode($response);
mysqli_close($con);

>>>>>>> 3d7a8e84d0b5b2bab93b45629bd2d62ccb481133
?>