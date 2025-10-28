<?php

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $num=$_POST['number'];
    $rev=0;

    while($num>0)
    {
        $rem=$num%10;
        $rev=($rev*10)+$rem;
        $num=(int)$num/10;
    }
    echo $rev;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reverse</title>
</head>
<body>
    <form method="POST" >
        <Label>Enter number :</Label>
        <input type="text" name="number">
        <br>

        <input type="submit" name="submit" value="Submit">

    </form>
</body>
</html>