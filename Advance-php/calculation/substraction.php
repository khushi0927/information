<?php

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $num=$_POST['number'];
    $sum=0;
    while($num>0)
    {
        $rem=$num%10;
        $sum+=$rem;
        $num=(int)$num/10;
    }
    echo "Sum of digits is : ".$sum;

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Substraction</title>
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