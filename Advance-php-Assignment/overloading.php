<?php

class A 
{
    function display($a,$b)
    {
        $c=$a+$b;
        echo "Additions of numbers is :".$c;

    }
}

class B extends A 
{
    function display($d,$e)
    {
        $g=$d*$e;
        echo "Multiplications  of numbers is :".$g;

    }
}

$obj=new B();
$obj->display(5,2);



?>