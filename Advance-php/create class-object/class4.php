<?php

class fruit 
{
    public $name;
    public $price;

    public function displaydata()
    {
        echo "name:".$this->name."<br>";
        echo "price:".$this->price."<br>";
    }
}

$f1=new fruit();
$f1->name="apple";
$f1->price=200;
$f1->displaydata();          

$f2=new fruit();
$f2->name="banana";
$f2->price=50;
$f2->displaydata();

?>