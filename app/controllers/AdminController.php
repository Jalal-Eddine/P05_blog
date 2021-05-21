<?php 

require_once("models/AdminManager.php");

class AdminController extends AdminManager {
    public function displayUsers()
    {
        $users = $this->getUsers();
        require('views/adminUsersManager.php');
    }
    public function createUser()
    {
        if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['passeword'])) {
            $affectedLines = $this->create($_POST['first_name'], $_POST['last_name'], $_POST['username'], $_POST['email'], $_POST['passeword']);
            if ($affectedLines === false) {
                throw new Exception('Impossible d\'ajouter un utilisateur !');
            } else {
                // header('Location: index.php?action=post&id=' . $postId);
                echo "User created successfuly";
                header("refresh:3;url=index.php?action=users");
            }
        } else {
            // Autre exception
            require('views/registerView.php');
        }
    }
    public function loginUser()
    {
        if (!empty($_POST['username']) && !empty($_POST['passeword'])){
        $result = $this->getUser($_POST['username']);
    
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
    public function logout()
     {
        session_start();
        
        // Suppression des variables de session et de la session
        unset($_SESSION['id']);
        unset($_SESSION['username']);
        session_destroy();
        
        // Suppression des cookies de connexion automatique
        // setcookie('login', '');
        // setcookie('pass_hache', '');
        header("Location: index.php?action=login");
     }
    
}