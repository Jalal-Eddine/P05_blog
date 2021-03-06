<?php
require_once("models/Manager.php");

class CommentManager extends Manager
{
    static protected $table_name = "comment";
    static protected $fVariable = "comment_status_id=";
    protected function get_id($postId)
    {
        $db = parent::dbConnect();
        $comments = $db->prepare('SELECT id, comment_status_id, title, content, DATE_FORMAT(created_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date FROM comment WHERE post_id = ? ORDER BY created_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }
    static public function get_ll()
    {
        $comments = parent::get_all();
        return $comments;
    }
    protected function create($postId, $title, $content)
    {
        $db = parent::dbConnect();
        $comments = $db->prepare('INSERT INTO comment(post_id, title, content, user_id,comment_status_id, created_date) VALUES(?, ?, ?,1,2, NOW())');
        $affectedLines = $comments->execute(array($postId, $title, $content));

        return $affectedLines;
    }
    protected function update($status,$id)
    {
        parent::update($status,$id);
    }
    protected function delete($id)
    {
        parent::delete($id);
    }
}
