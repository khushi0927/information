<?php

//Create Class

class student
{

    // public $name;
    // public $rollno;

    // Function
    public function displaydata($name,$rollno)
    {
        echo $name." ".$rollno."<br>";

    }
}

// create object

$std1=new student();
$std1->displaydata("khushi","19");

$std2=new student();
$std2->displaydata("avni","14");

$std3=new student();
$std3->displaydata("riya","6");

$std4=new student();
$std4->displaydata("nishaa","4");
?>