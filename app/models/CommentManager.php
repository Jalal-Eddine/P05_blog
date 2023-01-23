<?php
require_once("models/Manager.php");

class CommentManager extends Manager
{
    protected static  $table_name = "comment";
    protected static  $fVariable = "comment_status_id=";
    protected function get_id($postId)
    {
        $db = parent::dbConnect();
        $comments = $db->prepare('SELECT id, comment_status_id, title, content, DATE_FORMAT(created_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date FROM comment WHERE post_id = ? ORDER BY created_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }
    static public function get_all_comments()
    {
        $comments = parent::get_all("created_date");
        return $comments;
    }
    protected function create($postId, $title, $content, $userId)
    {
        $db = parent::dbConnect();
        $comments = $db->prepare('INSERT INTO comment(post_id, title, content, user_id,comment_status_id, created_date) VALUES(?, ?, ?,?,2, NOW())');
        $affectedLines = $comments->execute(array($postId, $title, $content, $userId));

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
