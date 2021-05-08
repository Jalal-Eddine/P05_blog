<?php
require_once("models/Manager.php"); // Vous n'alliez pas oublier cette ligne ? ;o)

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, hero_link, excerpt,content, DATE_FORMAT(update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS updated_date FROM post ORDER BY created_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, hero_link, excerpt, content, DATE_FORMAT(update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS updated_date FROM post WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
}