<?php
class Book {

    public $title;
    public $author;
    public $price;

    public function __construct($title, $author, $price) {
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
    }

    public function applyDiscount($percent) {
        return $this->price - ($this->price * $percent / 100);
    }

    public function showDetails() {
        echo "Title: $this->title <br>";
        echo "Author: $this->author <br>";
        echo "Price: ₹$this->price <br>";
        echo "<hr>";
    }
}

$book1 = new Book("RAMAYANA", "VALMII", 250);
$book2 = new Book("MAHABHARATA", "VED VYAS", 300);


$book1->showDetails();
echo "Discounted Price: ₹" . $book1->applyDiscount(10);
echo "<hr>";

$book2->showDetails();
echo "Discounted Price: ₹" . $book2->applyDiscount(20);
?>
