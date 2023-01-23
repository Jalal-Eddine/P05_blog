<?php

require_once("models/CommentManager.php");

class CommentsController extends CommentManager
{
    public function getComments()
    {
        $comments = $this->get_id($_GET['id']);
        return $comments;
    }
    public function commentsManger()
    {
        $comments = parent::get_all_comments();
        if (isset($_POST['submit'])) {
            self::updateComment();
        }
        if (isset($_POST['delete'])) {
            self::deleteComment();
        }
        require_once("views/admin/adminComments.php");
    }
    public function addComment()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                session_start();
                $affectedLines = $this->create($_GET['id'], $_POST['title'], $_POST['content'], $_SESSION['id']);
                if ($affectedLines === false) {
                    throw new Exception('Impossible to add a comment !');
                } else {
                    header('Location: index.php?action=post&id=' . $_GET['id']);
                }
            } else {
                // Autre exception
                throw new Exception('Not all the information were filled');
            }
        } else {
            // Autre exception
            throw new Exception('No post id was send');
        }
    }
    static public function commentStatus($status)
    {
        if ($status == 1) {
            $newStatus = 2;
        } else {
            $newStatus = 1;
        }
        return $newStatus;
    }
    static private function updateComment()
    {
        $status = $_POST['status'];
        $id = $_POST['id'];
        if (isset($status) && isset($id)) {
            $newStatus = self::commentStatus($status);
            parent::update($newStatus, $id);
            $_POST['status'] = null;
            $_POST['id'] = null;
            header("location: index.php?action=comments");
        }
    }
    static private function deleteComment()
    {
        $id = $_POST['delete_id'];
        if (isset($id)) {
            parent::delete($id);
            $_POST['delete_id'] = null;
            header("location: index.php?action=comments");
        }
    }
}
