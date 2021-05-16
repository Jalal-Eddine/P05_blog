<?php

// Chargement des classes
require_once('models/PostManager.php');
require_once('models/CommentManager.php');

function homePage()
{
    
}
function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('views/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('views/postView.php');
}
function postsManager() 
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts($_GET['id']); // Appel d'une fonction de cet objet

    require('views/adminPostsView.php');   
}
function createPost()
{
    require('views/createPostView.php');
}
function addPost($title, $hero_link, $excerpt, $content)
{
    $postManager = new PostManager();
    $affectedLines = $postManager->createPost($title, $hero_link, $excerpt, $content);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter l\'article !');
    }
    else {
        // header('Location: index.php?action=post&id=' . $postId);
        echo "post created successfuly";
        header( "refresh:3;url=index.php?action=listPosts" );
    }
}
function modifyPost()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet
    require('views/modifyPostView.php');
}
function updatePost()
{
    $postManager = new PostManager();
    $post = [];
    $id= $post['id'] = $_GET['id'];
    $post['title'] = $_POST['title'] ?? '';
    $post['hero_link'] = $_POST['hero_link'] ?? '';
    $post['excerpt'] = $_POST['excerpt'] ?? '';
    $post['content'] = $_POST['content'] ?? '';
    $affectedLines = $postManager->updatePost($post);
    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier l\'article !');
    }
    else {
        // header('Location: index.php?action=post&id=' . $postId);
        echo "post modified successfuly";
        header( "refresh:3;url=index.php?action=post&id=$id" );
    }
}
function deletePost()
{
    $postManager = new PostManager();  
    $deletePost = $postManager->deletePost($_GET['id']);
    header( "refresh:3;url=index.php?action=postsManager" );
}
function addComment($postId, $title, $content)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $title, $content);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}