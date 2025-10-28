<?php

 class A 
 {
    public function a()
    {
        echo "A called ";
    }
 }

 class B extends A
 {
    public function b()
    {
        echo "B called ";
    }
 }


 class C extends B
 {
    public function c()
    {
        echo "C called ";
    }
 }

 class D extends C
 {
    public function d()
    {
        echo "D called ";
    }
 }
 

 $d =new D();
 
$d->a;
echo "<br>";
$d->b;
echo "<br>";
$d->c;
echo "<br>";
$d->d;
echo "<br>";

?>