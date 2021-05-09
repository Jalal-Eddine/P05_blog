<?php

// Chargement des classes
require_once('models/PostManager.php');
require_once('models/CommentManager.php');


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
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

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
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        // header('Location: index.php?action=post&id=' . $postId);
        echo "post created successfuly";
        header( "refresh:3;url=index.php?action=listPosts" );
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