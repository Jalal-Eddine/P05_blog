<?php
require('controllers/AdminController.php');
require('controllers/CommentsController.php');
require('controllers/PostsController.php');

$postController = new PostsController;
$commentsController = new CommentsController;
$adminController = new AdminController;

try {
    if (isset($_GET['action'])) {
        // if(!isset($_SERVER['HTTP_REFERER'])){
        //     // redirect them to the homepage
        //     header('location:index.php');
        //     exit;
        // }
        if ($_GET['action'] == 'listPosts') {
            $postController->listPosts();
        } elseif ($_GET['action'] == 'post') {
            $postController->post();
        } elseif ($_GET['action'] == 'addComment') {
            $commentsController->addComment();
        } elseif ($_GET['action'] == 'comments') {
            $commentsController->commentsManger();
        } elseif ($_GET['action'] == 'postsManager') {
            $postController->postsManager();
        } elseif ($_GET['action'] == 'createPost') {
            $postController->createPost();
        } elseif ($_GET['action'] == 'modifyPost') {
            $postController->modifyPost();
        } elseif ($_GET['action'] == 'deletePost') {
            $postController->deletePost();
        } elseif ($_GET['action'] == 'login') {
            $adminController->login();
        } elseif ($_GET['action'] == 'register') {
            $adminController->createUser();
        } elseif ($_GET['action'] == 'users') {
            $adminController->userManager();
        } elseif ($_GET['action'] == 'logout') {
            $adminController->logout();
        } elseif ($_GET['action'] == 'dashboard') {
            $adminController->adminPanel();
        }
    } else {
        require('views/home.php');
    }
} catch (Exception $e) { // if there is an error 
    echo 'Erreur : ' . $e->getMessage();
    require('views/errorView.php');
}
