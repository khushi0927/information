<?php

if(isset($_COOKIE['user']))
{
    echo "welcome back ,". $_COOKIE['user']."<br>";
}
else
{
    echo "Cookie is not found";
}

if(isset($_COOKIE['visit_time']))
{
    echo "your last visit was on :". $_COOKIE['visit_time'];
}
else
{
    echo "visit time cookie is not found";
}
?>