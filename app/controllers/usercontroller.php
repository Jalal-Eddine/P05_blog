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
    }
    else {
        // header('Location: index.php?action=post&id=' . $postId);
        echo "User created successfuly";
        header( "refresh:3;url=index.php?action=users" );
    }
}