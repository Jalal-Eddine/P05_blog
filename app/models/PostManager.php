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
    // Get Post
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, hero_link, excerpt, content, DATE_FORMAT(update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS updated_date FROM post WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
    // Create post
    public function createPost($title, $hero_link, $excerpt, $content)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('INSERT INTO post(user_id, post_status_id, title, hero_link, excerpt, content,created_date,update_date) VALUES(1, 1, ?,?,?,?, NOW(),NOW())');
        $affectedLines = $post->execute(array($title, $hero_link, $excerpt, $content));

        return $affectedLines;
    }
    //Modify post
    public function updatePost($post)
    {
        $db = $this->dbConnect();
        $sql = "UPDATE post SET ";
        $sql .= "post_status_id='" . "1" . "', ";
        $sql .= "title='" . $post['title'] . "', ";
        $sql .= "hero_link='" . $post['hero_link'] . "', ";
        $sql .= "excerpt='" . $post['excerpt'] . "', ";
        $sql .= "content='" . $post['content'] . "', ";
        $sql .= "update_date='" . "NOW()" . "' ";
        $sql .= "WHERE id='" . $post['id'] . "' ";
        $sql .= "LIMIT 1";
        $stmt = $db->prepare($sql);
        $stmt->execute();

    }
    // Delete Post
    public function deletePost($postId)
    {
        try {
         $db = $this->dbConnect();
          // sql to delete a record
          $delete = $db->prepare("DELETE FROM post WHERE id=?");
          // use exec() because no results are returned
          $delete->execute(array($postId));
          echo "Record deleted successfully";
        } catch(PDOException $e) {
          echo $e->getMessage();
        }
    }
}