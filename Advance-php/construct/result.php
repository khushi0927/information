<<<<<<< HEAD
<?php

class student 
{
    public $name;
    public $marks;

    public function __construct($name,$marks)
    {
        $this->name=$name;
        $this->marks=$marks;
    }

    public function result()
    {
        if($this->marks>=70)
        {
            echo "A grade";
        }
        else if($this->marks>=60)
        {
            echo "B grade";
        }
        else if($this->marks>=50)
        {
            echo "C grade";
        }
        else if($this->marks>=40)
        {
            echo "D grade";
        }
        else
        {
            echo "You Are Fail....";
        }
    }
}

$s1=new student("Khushi","20");
$s1->result();
=======
<?php

class student 
{
    public $name;
    public $marks;

    public function __construct($name,$marks)
    {
        $this->name=$name;
        $this->marks=$marks;
    }

    public function result()
    {
        if($this->marks>=70)
        {
            echo "A grade";
        }
        else if($this->marks>=60)
        {
            echo "B grade";
        }
        else if($this->marks>=50)
        {
            echo "C grade";
        }
        else if($this->marks>=40)
        {
            echo "D grade";
        }
        else
        {
            echo "You Are Fail....";
        }
    }
}

$s1=new student("Khushi","20");
$s1->result();
>>>>>>> 3d7a8e84d0b5b2bab93b45629bd2d62ccb481133
?>