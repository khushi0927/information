<?php
class test {

    public $publicVar = "Public";
    protected $protectedVar = "Protected";
    private $privateVar = "Private";

    public function showPublic() {
        echo $this->publicVar . "<br>";
    }

    protected function showProtected() {
        echo $this->protectedVar . "<br>";
    }

    private function showPrivate() {
        echo $this->privateVar . "<br>";
    }

    public function showAll() {
        $this->showPublic();
        $this->showProtected();
        $this->showPrivate();
    }
}


class Child extends test {
    public function access() {
        echo $this->publicVar . "<br>";       
        echo $this->protectedVar . "<br>";   

    }
}

$obj = new test();
$obj->showAll();

$child = new Child();
$child->access();
?>
