<?php

class A 
{
    public function a()
    {
        echo "A";
    }
}

class B extends A
{
    public function b()
    {
        echo "B";
    }
}

trait C
{
    public function c()
        {
            echo "C";
        }
}

class D extends B
{
    use C;
    public function d()
        {
            echo "D ";
        }
}

$d = new D();

$d->a();
echo "<br>";
$d->b();
echo "<br>";
$d->c();
echo "<br>";
$d->d();
echo "<br>";
?>