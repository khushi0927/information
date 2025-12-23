<?php
class Student {

    private $marks = 80; 

    public function getMarks() {   
        return $this->marks;
    }
}

$stu = new Student();
echo $stu->getMarks();
?>