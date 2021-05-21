<?php

// Chargement des classes
require_once('models/AdminManager.php');

function displayUsers()
{
    $userManager = new UserManager();
    $users = $userManager->getUsers();
    require('views/adminUsersManager.php');
}
function createUser($first_name, $last_name, $username, $email, $passeword)
{

    $userManager = new UserManager();
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
    $userManager = new UserManager();
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
        header("Location: index.php?action=listPosts");
    }
    require('views/loginView.php');
}
function logout()
 {
    session_start();
    
    // Suppression des variables de session et de la session
    // $_SESSION = array();
    session_destroy();
    
    // Suppression des cookies de connexion automatique
    // setcookie('login', '');
    // setcookie('pass_hache', '');
    header("Location: index.php?action=login");
 }
