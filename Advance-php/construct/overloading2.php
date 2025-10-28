<?php

class employee
{
    public $name;
    public $position;

    public function __construct($n="Tops",$p="Trainer")
    {
        $this->name=$n;
        $this->position=$p;

    }
    public function display()
    {
        echo "name : $this->name <br> role : $this->position"." <br>";
    }
}

$e1=new employee();
$e1->display();      

$e2=new employee("Khushi","Manager");
$e2->display();

?>