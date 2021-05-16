<?php

// Chargement des classes
require_once('models/UserManager.php');

function displayUsers()
{
    $userManager = new UserManger();
    $users = $userManager->getUsers();
    require('views/adminUsersManager.php');
}
function createUser($first_name, $last_name, $username, $email, $passeword)
{

    $userManager = new UserManger();
    $affectedLines = $userManager->createUser($first_name, $last_name, $username, $email, $passeword);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter un utilisateur !');
    } else {
        // header('Location: index.php?action=post&id=' . $postId);
        echo "User created successfuly";
        header("refresh:3;url=index.php?action=users");
    }
}
function loginUser()
{
    if (!empty($_POST['username']) && !empty($_POST['passeword'])){
    $userManager = new UserManger();
    $result = $userManager->getUser($_POST['username']);

    // Comparaison du pass envoyé via le formulaire avec la base
    $isPasswordCorrect = password_verify($_POST['passeword'], $result['passeword']);

    if (!$result) {
        echo 'Mauvais identifiant ou mot de passe !';
    } else {
        if ($isPasswordCorrect) {
            session_start();
            $_SESSION['id'] = $result['id'];
            $_SESSION['username'] = $_POST['username'];
            echo 'Vous êtes connecté !';
        } else {
            echo 'Mauvais identifiant ou mot de passe !';
        }
     }
        echo "you're login";
        header("refresh:3;url=index.php?action=listPosts");
    }
    require('views/loginView.php');
}
