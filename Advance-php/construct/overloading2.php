<<<<<<< HEAD
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

=======
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

>>>>>>> 3d7a8e84d0b5b2bab93b45629bd2d62ccb481133
?>