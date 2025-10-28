<?php

class shape 
{
    public $a;
    public $b;

    public function display($n,$m)
    {
        $this->a = $n;
        $this->b = $m;
        echo "The value of a is: " . $this->a . "<br>";
        echo "The value of b is: " . $this->b . "<br>";
    }
}
    class rectangle extends shape
    {
        public function area()
        {
            $area=$this->a * $this->b ;
            echo "The area of rectangle is: " . $area . "<br>";
        }
    }

    class triangle extends shape
    {
        public function area()
        {
            $area=0.5 * $this->a * $this->b ;
            echo "The area of triangle is: " . $area . "<br>";
        }
    }

    $rect = new rectangle();
    $rect->display(5,25); 
    $rect->area();

    echo "<br>";

    $tra = new triangle();
    $tra->display(20,30);
    $tra->area();



?>