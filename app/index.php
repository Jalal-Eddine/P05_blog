<?php
require('controllers/controller.php');
require('controllers/usercontroller.php');

try { // On essaie de faire des choses
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            } else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('No post id was send');
            }
        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['title']) && !empty($_POST['content'])) {
                    addComment($_GET['id'], $_POST['title'], $_POST['content']);
                } else {
                    // Autre exception
                    throw new Exception('Not all the information were filled');
                }
            } else {
                // Autre exception
                throw new Exception('No post id was send');
            }
        } elseif ($_GET['action'] == 'postsManager') {
            postsManager();
        } elseif ($_GET['action'] == 'createPost') {
            createPost();
        } elseif ($_GET['action'] == 'addPost') {
            // if (true) {
            if (!empty($_POST['title']) && !empty($_POST['hero_link']) && !empty($_POST['excerpt']) && !empty($_POST['content'])) {
                addPost($_POST['title'], $_POST['hero_link'], $_POST['excerpt'], $_POST['content']);
            } else {
                // Autre exception
                throw new Exception('Not all the information were filled');
            }
            // }
            // else {
            //     // Autre exception
            //     throw new Exception('No post id was send');
            // }
        }
        // elseif($_GET['action'] == 'createPost') {
        //     createPost();
        // }
        elseif ($_GET['action'] == 'modifyPost') {
            modifyPost();
        } elseif ($_GET['action'] == 'updatePost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['title']) && !empty($_POST['hero_link']) && !empty($_POST['excerpt']) && !empty($_POST['content'])) {
                    updatePost();
                } else {
                    // Autre exception
                    throw new Exception('Not all the information were filled');
                }
            } else {
                // Autre exception
                throw new Exception('No post id was send');
            }
        } elseif ($_GET['action'] == 'deletePost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deletePost();
            } else {
                // Autre exception
                throw new Exception('No post id was send');
            }
        } elseif ($_GET['action'] == 'login') {
            loginUser();
        } elseif ($_GET['action'] == 'register') {
            require('views/registerView.php');
        } elseif ($_GET['action'] == 'users') {
            displayUsers();
        } elseif ($_GET['action'] == 'createUser') {

            if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['passeword'])) {
                createUser($_POST['first_name'], $_POST['last_name'], $_POST['username'], $_POST['email'], $_POST['passeword']);
            } else {
                // Autre exception
                throw new Exception('Not all the information were filled');
            }
        }
    } else {
        // listPosts();
        require('views/home.php');
    }
} catch (Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
    require('views/errorView.php');
}
