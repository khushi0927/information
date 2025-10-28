<?php

class student 
{
    public $name;
    public $class;
    public $rollno;

    public function displaydata()
    {
        echo "name is :".self::$name."<br>"; 
        echo "class is :".self::$class."<br>";    
        echo "rollno is :".self::$rollno."<br>";       
    }
}

student::$name="khushi";
student::$class="BCA-B";
student::$rollno=12;

student::$name="avni";
student::$class="BCA-A";
student::$rollno=12;

student::$name="khushi";
student::$class="BCA-B";
student::$rollno=12;
?>