<?php
class Book {

    public $title;
    public $author;
    public $price;

    // Constructor
    public function __construct($title, $author, $price) {
        $this->title  = $title;
        $this->author = $author;
        $this->price  = $price;
    }

    // discount
    public function applyDiscount($percent) {
        $discount = ($this->price * $percent) / 100;
        return $this->price - $discount;
    }
}

$book = new Book("RAMAYANA", "VALMIKI", 250);
echo "New Price: " . $book->applyDiscount(10);
?>
