<?php

class mobile 
{
    public function displaydata($name,$company,$price,$category)
    {
        echo $name." ".$company." ".$price." ".$category."<br>";
    }
}

$m1=new mobile();
$m1->displaydata("samsung","galaxy","15000","android");

$m2=new mobile();
$m2->displaydata("apple","iphone","50000","ios");

$m3=new mobile();
$m3->displaydata("oneplus","nord","30000","android");

$m4=new mobile();
$m4->displaydata("vivo","y20","12000","android");

?>