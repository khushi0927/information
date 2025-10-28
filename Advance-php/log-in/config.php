<?php

define ("server","localhost");
define ("user","root");
define ("pass","");
define ("db","login");

$con=new mysqli(server,user,pass,db);

if($con)
{
    echo "connection successfully";
}
else
{
    echo "something went wrong";
}


?>