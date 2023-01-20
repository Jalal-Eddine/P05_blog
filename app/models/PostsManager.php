<?php
require_once("models/Manager.php");

class PostsManager extends Manager
{
    static protected $table_name = "post";
    protected function getPosts()
    {
        $req = parent::get_all();
        return $req;
    }
    // Get Post
    protected function getPost($postId)
    {
        $req = parent::get_by_id($postId);
        $post = $req->fetch();
        return $post;
    }
    // Create post
    protected function create($userId, $title, $hero_link, $excerpt, $content)
    {
        $db = parent::dbConnect();
        $post = $db->prepare('INSERT INTO post(user_id, post_status_id, title, hero_link, excerpt, content,created_date,update_date) VALUES(?, 1, ?,?,?,?, NOW(),NOW())');
        $affectedLines = $post->execute(array($userId, $title, $hero_link, $excerpt, $content));

        return $affectedLines;
    }
    //Modify post
    protected function updatePost($post)
    {
        $db = parent::dbConnect();
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
    static protected function delete($postId)
    {
        try {
            $db = parent::dbConnect();
            // sql to delete a record
            $delete = $db->prepare("DELETE FROM post WHERE id=?");
            // use exec() because no results are returned
            $delete->execute(array($postId));
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
