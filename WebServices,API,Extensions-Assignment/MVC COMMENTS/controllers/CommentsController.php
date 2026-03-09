<?php
require_once "models/CommentModel.php";

class CommentController {

    private $model;

    public function __construct(){
        $this->model = new CommentModel();
    }

    public function index(){
        $comments = $this->model->getComments();
        include "views/comments.php";
    }

    public function insert(){
        if(isset($_POST['submit'])){
            $this->model->insertComment($_POST['username'],$_POST['comment']);
            header("Location:index.php");
        }
    }

    public function delete(){
        if(isset($_GET['delete'])){
            $this->model->deleteComment($_GET['delete']);
            header("Location:index.php");
        }
    }

}
?>