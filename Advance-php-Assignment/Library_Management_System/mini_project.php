<?php
//interface
interface LibraryInterface {
    public function addBook($name);
    public function showBook();
}

//parent class
class LibraryItem {

    protected $bookName;

    public function __construct($name) {
        $this->bookName = $name;
    }
}

//child class
class Book extends LibraryItem implements LibraryInterface {

    private $data = [];

    public function __set($key, $value) {
        $this->data[$key] = $value;
    }

    public function __get($key) {
        return $this->data[$key];
    }

    public function addBook($name) {
        $this->bookName = $name;
    }

    public function showBook() {
        echo "Book Name: " . $this->bookName . "<br>";
        echo "Author: " . $this->author . "<br>";
    }
}

//static method
class LibraryHelper {

    public static function welcome() {
        echo "Welcome to Library Management System<br><br>";
    }
}

//object
LibraryHelper::welcome();

$book = new Book("RAMAYANA");
$book->author = "VALMIKI"; 

$book = new Book("MAHABHARAT");
$book->author = "VED VYAS"; 

$book->showBook(); 

?>