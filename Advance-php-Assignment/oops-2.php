<?php

abstract class LibraryMember {
    protected $name;
    protected $id;

    public function __construct($name, $id) {
        $this->name = $name;
        $this->id = $id;
    }

    abstract public function borrowBook($book);
    abstract public function returnBook($book);

    public function getName() {
        return $this->name;
    }

    public function getId() {
        return $this->id;
    }
}

class User extends LibraryMember {
    private $borrowedBooks = [];

    public function borrowBook($book) {
        if ($book->isAvailable()) {
            $this->borrowedBooks[] = $book;
            $book->setAvailability(false);
            echo "{$this->name} borrowed '{$book->getTitle()}'\n";
        } else {
            echo "'{$book->getTitle()}' is currently unavailable.\n";
        }
    }

    public function returnBook($book) {
        if (($key = array_search($book, $this->borrowedBooks)) !== false) {
            unset($this->borrowedBooks[$key]);
            $book->setAvailability(true);
            echo "{$this->name} returned '{$book->getTitle()}'\n";
        }
    }

    public function listBorrowedBooks() {
        echo "{$this->name} has borrowed: ";
        if (empty($this->borrowedBooks)) {
            echo "None\n";
        } else {
            foreach ($this->borrowedBooks as $book) {
                echo $book->getTitle() . ", ";
            }
            echo "\n";
        }
    }
}

class Book {
    private $title;
    private $author;
    private $available = true;

    public function __construct($title, $author) {
        $this->title = $title;
        $this->author = $author;
    }

    public function isAvailable() {
        return $this->available;
    }

    public function setAvailability($status) {
        $this->available = $status;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }
}

class Transaction {
    private $user;
    private $book;
    private $date;

    public function __construct($user, $book) {
        $this->user = $user;
        $this->book = $book;
        $this->date = date("Y-m-d H:i:s");
    }

    public function logTransaction($action) {
        echo "Transaction: {$action} | User: {$this->user->getName()} | Book: {$this->book->getTitle()} | Date: {$this->date}\n";
    }
}


$book1 = new Book("1984", "a");
$book2 = new Book("abc", "wyz");

$user1 = new User("abc", 101);
$user2 = new User("Bob", 102);

$user1->borrowBook($book1);
$trans1 = new Transaction($user1, $book1);
$trans1->logTransaction("Borrowed");

$user2->borrowBook($book1);

$user1->returnBook($book1);
$trans2 = new Transaction($user1, $book1);
$trans2->logTransaction("Returned");

$user2->borrowBook($book1);
$trans3 = new Transaction($user2, $book1);
$trans3->logTransaction("Borrowed");

$user1->listBorrowedBooks();
$user2->listBorrowedBooks();
?>