<?php

require_once "controllers/CommentsController.php";

$controller = new CommentController();

$action = $_GET['action'] ?? 'index';

switch($action){

    case 'insert':
        $controller->insert();
        break;

    case 'delete':
        $controller->delete();
        break;

    default:
        $controller->index();
}
?>