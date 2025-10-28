<?php

 class A 
 {
    public function a()
    {
        echo "A called";
    }
 }

 class B extends A
 {
    public function b()
    {
        echo "B called";
    }
 }

$obj = new B();

$obj->a();
echo "<br>";
$obj->b();


?>