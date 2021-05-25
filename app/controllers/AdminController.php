<?php

require_once("models/AdminManager.php");

class AdminController extends AdminManager
{
    public $role;
    public $first_name;
    public $last_name;
    public $username;
    public $email;
    protected $hashed_password;
    protected $password;

    public function full_name()
    {
        return $this->first_name . " " . $this->last_name;
    }
    protected function set_hashed_password()
    {
        $this->hashed_password = password_hash($this->password, PASSWORD_DEFAULT);
    }
    public function verify_password()
    {
        return password_verify($this->password, $this->hashed_password);
    }
    public function displayUsers()
    {
        if ($this->is_admin()) {
            $req = $this->getUsers();
            require('views/admin/adminUsersManager.php');
        } else {
            header("Location: index.php");
        }
    }
    public function adminPanel()
    {
        if ($this->is_admin()) {
            require('views/admin/adminPanel.php');
        } else {
            header("Location: index.php");
        }
    }

    public function registerFields()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->first_name = $_POST['first_name'];
            $this->last_name = $_POST['last_name'];
            $this->username = $_POST['username'];
            $this->email = $_POST['email'];
            $this->password = $_POST['password'];
            $this->set_hashed_password();
        } else {
            require('views/registerView.php');
        }
    }
    public function createUser()
    {
        $this->registerFields();
        if (!empty($this->first_name) && !empty($this->last_name) && !empty($this->username) && !empty($this->email) && !empty($this->hashed_password)) {
            $affectedLines = $this->create($this->first_name, $this->last_name, $this->username, $this->email, $this->hashed_password);
            if ($affectedLines === false) {
                throw new Exception('Fill all the fields !');
            } else {
                echo "User created successfuly";
                header("refresh:3;url=index.php?action=login");
            }
        } else {
            echo "Please fill all the fields";
        }
    }
    public function set_user($user)
    {
        $this->id = $user['id'];
        $this->first_name = $user['first_name'];
        $this->last_name = $user['last_name'];
        $this->role = $user['user_role_id'];
    }
    public function create_session()
    {
        session_start();
        $_SESSION['id'] = $this->id;
        $_SESSION['username'] = $this->username;
        $_SESSION['role'] = $this->role;
        $_SESSION['first_name'] = $this->first_name;
        $_SESSION['last_name'] = $this->last_name;
    }
    public function loginFields()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->username = $_POST['username'];
            $this->password = $_POST['password'];
        } else {
            require('views/loginView.php');
        }
    }
    public function login()
    {
        $this->loginFields();
        if (!empty($this->username) && !empty($this->password)) {
            $user = parent::get_by_username($this->username);
            $this->hashed_password = $user['password'];
            $isPasswordCorrect = $this->verify_password();
            print_r($isPasswordCorrect);
            if (!$user) {
                echo 'Database error!';
            } else {
                if ($isPasswordCorrect) {
                    $this->set_user($user);
                    $this->create_session();
                    echo 'you\'re connected !';
                    header("Location: index.php");
                } else {
                    echo 'Wrong credentials !';
                }
            }
        }
        require('views/loginView.php');
    }
    public function is_logged_in()
    {
        // return isset($this->admin_id);
        session_start();
        return isset($_SESSION['id']);
    }
    public function is_admin()
    {
        session_start();
        $role = $_SESSION['role'];
        if($role ==1) {
            return true;
        }else{
            return false;
        }
    }
    public function logout()
    {
        session_start();
        // Suppression des variables de session et de la session
        unset($_SESSION['id']);
        unset($_SESSION['username']);
        unset($_SESSION['first_name']);
        unset($_SESSION['last_name']);
        unset($_SESSION['role']);
        unset($this->id);
        unset($this->username);
        session_destroy();
        header("Location: index.php");
    }
}
