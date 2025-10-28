<?php

trait A 
{
    public function data1()
    {
        echo "A called";
    }
}

trait B 
{
    public function data2()
    {
        echo "B called";
    }
}

trait C 
{
    public function data3()
    {
        echo "C called";
    }
}

class D
{
    use A,B,C;
}

$obj=new D();
$obj -> data1();
echo "<br>";
$obj -> data2();
echo "<br>";
$obj -> data3();
?>