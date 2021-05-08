<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Mon super blog !</h1>
        <p><a href="index.php">Retour à la liste des billets</a></p>

        <div class="news">
            <h3>
                <?= htmlspecialchars($post['title']) ?>
                <em>le <?= $post['updated_date'] ?></em>
            </h3>
            
            <p>
                <?= nl2br(htmlspecialchars($post['content'])) ?>
            </p>
        </div>

        <h2>Commentaires</h2>

        <?php
        while ($comment = $comments->fetch())
        {
        ?>
            <p><strong>commented</strong> le <?= $comment['comment_date'] ?></p>
            <h3><?= nl2br(htmlspecialchars($comment['title'])) ?></h3>
            <p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
        <?php
        }
        ?>
                <!-- ... -->

            <h2>Commentaires</h2>

            <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
            <div>
                <label for="title">Title</label><br />
                <input type="text" id="title" name="title" />
            </div>
            <div>
                <label for="content">Commentaire</label><br />
                <textarea id="content" name="content"></textarea>
            </div>
            <div>
                <input type="submit" />
            </div>
            </form>

            <!-- ... -->

    </body>
</html>