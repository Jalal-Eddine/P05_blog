<?php
require_once("models/Manager.php");

class PostsManager extends Manager
{
    static protected $table_name = "post";
    // GET ALL POSTS
    protected function getPosts()
    {
        $req = parent::get_all();
        return $req;
    }
    // GET A POST
    protected function getPost($postId)
    {
        $conn = parent::dbConnect();
        $sql = "SELECT post.*, user.first_name, user.last_name FROM user LEFT JOIN post ON user.id = post.user_id";
        $sql .= " WHERE post.id= " . $postId;
        $req = $conn->prepare($sql);
        $req->execute();
        $conn = null;
        $post = $req->fetch();
        return $post;
    }
    // GET Authors
    protected function getAuthors()
    {
        self::$table_name = "user";
        $req = parent::get_all();
        self::$table_name = "post";
        return $req;
    }
    // CREATE POST
    protected function create($userId, $title, $hero_link, $excerpt, $content)
    {
        $db = parent::dbConnect();
        $post = $db->prepare('INSERT INTO post(user_id, post_status_id, title, hero_link, excerpt, content,created_date,update_date) VALUES(?, 1, ?,?,?,?, NOW(),NOW())');
        $affectedLines = $post->execute(array($userId, $title, $hero_link, $excerpt, $content));

        return $affectedLines;
    }
    // MODIFY POST
    protected function updatePost($post)
    {
        $db = parent::dbConnect();
        $sql = "UPDATE post SET ";
        $sql .= "user_id='" . $post['user_id'] . "', ";
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
    // DELETE POST
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
