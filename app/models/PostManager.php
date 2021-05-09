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
    // create post
    public function createPost($title, $hero_link, $excerpt, $content)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('INSERT INTO post(user_id, post_status_id, title, hero_link, excerpt, content,created_date,updated_date) VALUES(1, 1, ?,?,?,?, NOW(),NOW())');
        $affectedLines = $post->execute(array($title, $hero_link, $excerpt, $content));

        return $affectedLines;
    }
    // Modify post
    // public function modifyPost($title, $hero_link, $excerpt, $content)
    // {
    //     $db = $this->dbConnect();
    //     $post = $db->prepare('INSERT INTO post(user_id, post_status_id, title, hero_link, excerpt, content,created_date) VALUES(1, 1, ?,?,?,?, NOW())');
    //     $affectedLines = $post->execute(array($title, $hero_link, $excerpt, $content));

    //     return $affectedLines;
    // }
}