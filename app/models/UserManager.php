<?php
require_once("models/Manager.php"); // Vous n'alliez pas oublier cette ligne ? ;o)

class UserManger extends Manager
{
    public function getUsers()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, first_name, last_name, username, email, passeword, DATE_FORMAT(inscription_date, \'%d/%m/%Y at %Hh%imin%ss\') AS inscription_date FROM user ORDER BY inscription_date DESC LIMIT 0, 5');

        return $req;
    }
    // Create user
    public function createUser($first_name, $last_name, $username, $email, $passeword)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO user(user_role_id, first_name, last_name, username, email, passeword, inscription_date) VALUES(1,?,?,?,?,?,NOW())');
        $affectedLines = $req->execute(array($first_name, $last_name, $username, $email, $passeword));

        return $affectedLines;
    }

    public function deleteUser($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
    public function updateUser()
    {

    }
}