<?php
require_once 'app/models/Post.php';

class PostController {
    private $postModel;

    public function __construct() {
        $this->postModel = new Post();
    }

    public function index() {
        $posts = $this->postModel->getAll();
        include 'app/views/layout.php';
    }

    public function show($id) {
        $post = $this->postModel->getById($id);
        include 'app/views/posts/show.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $this->postModel->create($title, $content);
            header("Location: index.php");
            exit;
        }
        include 'app/views/posts/create.php';
    }

    public function edit($id) {
        $post = $this->postModel->getById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $this->postModel->update($id, $title, $content);
            header("Location: index.php");
            exit;
        }
        include 'app/views/posts/edit.php';
    }

    public function delete($id) {
        $this->postModel->delete($id);
        header("Location: index.php");
        exit;
    }
}
