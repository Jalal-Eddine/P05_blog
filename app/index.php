<?php
require('controllers/controller.php');

try { // On essaie de faire des choses
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('No post id was send');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['title']) && !empty($_POST['content'])) {
                    addComment($_GET['id'], $_POST['title'], $_POST['content']);
                }
                else {
                    // Autre exception
                    throw new Exception('Not all the information were filled');
                }
            }
            else {
                // Autre exception
                throw new Exception('No post id was send');
            }
        }
        elseif($_GET['action'] == 'createPost') {
            createPost();
        }
        elseif ($_GET['action'] == 'addPost') {
            // if (true) {
                if (!empty($_POST['title']) && !empty($_POST['hero_link'])&& !empty($_POST['excerpt'])&& !empty($_POST['content'])) {
                    addPost($_POST['title'], $_POST['hero_link'], $_POST['excerpt'],$_POST['content']);
                }
                else {
                    // Autre exception
                    throw new Exception('Not all the information were filled');
                }
            // }
            // else {
            //     // Autre exception
            //     throw new Exception('No post id was send');
            // }
        }
    }
    else {
        // listPosts();
        require('views/home.php');
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
    require('views/errorView.php');
}
