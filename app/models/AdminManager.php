<?php
require_once("models/Manager.php");

class AdminManager extends Manager
{
    static protected $table_name = "user";
    static protected $fVariable = "user_role_id=";

    protected function getUsers()
    {
        $req = parent::get_all();
        return $req;
    }
    // GET USER FOR CONNECTION
    static protected function get_by_username($username)
    {
        //  GET USER AND THE HASHED PASSWORD
        $db = parent::dbConnect();
        $req = $db->prepare('SELECT * FROM user WHERE username = :username');
        $req->execute(array('username' => $username));
        $result = $req->fetch();
        $db = null;
        return $result;
    }
    // CREATE USER
    protected function create($first_name, $last_name, $username, $email, $hashed__password)
    {
        $db = parent::dbConnect();
        $req = $db->prepare('INSERT INTO user(user_role_id, first_name, last_name, username, email, password, inscription_date) VALUES(2,?,?,?,?,?,NOW())');
        $affectedLines = $req->execute(array($first_name, $last_name, $username, $email, $hashed__password));
        $db = null;
        return $affectedLines;
    }
    static protected function update($status, $id)
    {
        parent::update($status, $id);
    }
    static protected function delete($id)
    {
        parent::delete($id);
    }
}
