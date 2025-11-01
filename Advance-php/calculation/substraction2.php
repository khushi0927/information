<<<<<<< HEAD
<?php

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $num=$_POST['number'];
    
    $ldigit=$num%10;

    while($num>0)
    {
        if($num>9)
        {
            $num=(int) $num/10;
        }
        else
        {
            $fdigit=$num;
            $num=(int) $num/10;

        }
    }
    $ans=$fdigit+$ldigit;
    echo $ans;
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
=======
<?php

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $num=$_POST['number'];
    
    $ldigit=$num%10;

    while($num>0)
    {
        if($num>9)
        {
            $num=(int) $num/10;
        }
        else
        {
            $fdigit=$num;
            $num=(int) $num/10;

        }
    }
    $ans=$fdigit+$ldigit;
    echo $ans;
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
>>>>>>> 3d7a8e84d0b5b2bab93b45629bd2d62ccb481133
</html>