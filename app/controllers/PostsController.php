<?php
require_once("models/PostsManager.php");
require_once("controllers/CommentsController.php");

class PostsController extends PostsManager
{
    public function listPosts()
    {
        $posts = $this->getPosts();
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
            throw new Exception('this post doesn\'t exist');
        }
    }

    public function postsManager()
    {
        session_start();
        if ($_SESSION['role'] == 1) {
            $posts = $this->getPosts();
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
                $affectedLines = $this->create($_SESSION['id'], $_POST['title'], $_POST['hero_link'], $_POST['excerpt'], $_POST['content']);
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
            $id = $_GET['id'];
            if (isset($id) && $id > 0) {
                if (!empty($_POST['title']) && !empty($_POST['hero_link']) && !empty($_POST['excerpt']) && !empty($_POST['content'])) {
                    $post = [];
                    $id = $post['id'] = $id;
                    $post['title'] = $_POST['title'] ?? '';
                    $post['user_id'] = $_POST['author'] ?? '';
                    $post['hero_link'] = $_POST['hero_link'] ?? '';
                    $post['excerpt'] = $_POST['excerpt'] ?? '';
                    $post['content'] = $_POST['content'] ?? '';
                    $post['update_date'] =  date('Y-m-d H:i:s');;
                    $affectedLines = $this->updatePost($post);
                    if ($affectedLines === false) {
                        throw new Exception('Impossible de modifier l\'article !');
                    } else {
                        // header('Location: index.php?action=post&id=' . $postId);
                        echo "post modified successfuly";
                        header("refresh:3;url=index.php?action=post&id=$id");
                    }
                } else {
                    $post = $this->getPost($id);
                    $authors = $this->getAuthors();
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
