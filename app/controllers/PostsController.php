<?php

require_once("models/PostsManager.php");
require_once("controllers/CommentsController.php");

class PostsController extends PostsManager
{

    public function listPosts()
    {
        $posts = $this->getPosts(); // Appel d'une fonction de cet objet
        require('views/listPostsView.php');
    }
    public function post()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $commentManager = new CommentsController();

            $post = $this->getPost($_GET['id']);
            $comments = $commentManager->getComments($_GET['id']);
            session_start();
            require('views/postView.php');
        } else {
            // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
            throw new Exception('No post id was send');
        }
    }
    public function postsManager()
    {
        session_start();
        if ($_SESSION['role'] == 1) {
            $posts = $this->getPosts(); // Appel d'une fonction de cet objet
            require('views/admin/adminPostsView.php');
        } else {
            header("location: index.php");
        }
    }
    public function createPost()
    {
        session_start();
        if ($_SESSION['role'] == 1) {
            if (!empty($_POST['title']) && !empty($_POST['hero_link']) && !empty($_POST['excerpt']) && !empty($_POST['content'])) {
                $affectedLines = $this->create($_POST['title'], $_POST['hero_link'], $_POST['excerpt'], $_POST['content']);
                if ($affectedLines === false) {
                    throw new Exception('Impossible d\'ajouter l\'article !');
                } else {
                    // header('Location: index.php?action=post&id=' . $postId);
                    echo "post created successfuly";
                    header("refresh:3;url=index.php?action=listPosts");
                }
            } else {
                require('views/admin/createPostView.php');
            }
        } else {
            header("location: index.php");
        }
    }

    public function modifyPost()
    {
        session_start();
        if ($_SESSION['role'] == 1) {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['title']) && !empty($_POST['hero_link']) && !empty($_POST['excerpt']) && !empty($_POST['content'])) {
                    $post = [];
                    $id = $post['id'] = $_GET['id'];
                    $post['title'] = $_POST['title'] ?? '';
                    $post['hero_link'] = $_POST['hero_link'] ?? '';
                    $post['excerpt'] = $_POST['excerpt'] ?? '';
                    $post['content'] = $_POST['content'] ?? '';
                    $affectedLines = $this->updatePost($post);
                    if ($affectedLines === false) {
                        throw new Exception('Impossible de modifier l\'article !');
                    } else {
                        // header('Location: index.php?action=post&id=' . $postId);
                        echo "post modified successfuly";
                        header("refresh:3;url=index.php?action=post&id=$id");
                    }
                } else {
                    $posts = $this->getPosts(); // Appel d'une fonction de cet objet
                    require('views/admin/modifyPostView.php');
                }
            } else {
                // Autre exception
                throw new Exception('No post id was send');
            }
        } else {
            header("location: index.php");
        }
    }
    public function deletePost()
    {
        session_start();
        if ($_SESSION['role'] == 1) {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $deletePost = $this->delete($_GET['id']);
                header("refresh:3;url=index.php?action=postsManager");
            } else {
                // Autre exception
                throw new Exception('No post id was send');
            }
        } else {
            header("location: index.php");
        }
    }
}
