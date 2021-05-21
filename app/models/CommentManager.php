<?php
require_once("models/Manager.php");

class CommentManager extends Manager
{
    protected function get($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, title, content, DATE_FORMAT(created_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date FROM comment WHERE post_id = ? ORDER BY created_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }
    protected function create($postId, $title, $content)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comment(post_id, title, content, user_id,comment_status_id, created_date) VALUES(?, ?, ?,1,1, NOW())');
        $affectedLines = $comments->execute(array($postId, $title, $content));

        return $affectedLines;
    }
}