<?php 

require_once("models/CommentManager.php");

class CommentsController extends CommentManager {
    public function getComments()
    {
        $comments = $this->get($_GET['id']);
        return $comments;
    }
    public function addComment()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $affectedLines = $this->create($_GET['id'], $_POST['title'], $_POST['content']);
                if ($affectedLines === false) {
                    throw new Exception('Impossible d\'ajouter le commentaire !');
                }
                else {
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
}