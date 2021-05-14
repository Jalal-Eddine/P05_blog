<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>

<p><a href="index.php?action=listPosts">Retour à la liste des billets</a></p>

<div id="main" class="alt">

    <!-- One -->
    <section id="one">
        <div class="inner">
            <header class="major">
                <h1><?= htmlspecialchars($post['title']) ?></h1><br>
                <em>le <?= $post['updated_date'] ?></em>
            </header>
            <span class="image main"><img src="<?= $post['hero_link'] ?>" alt="" /></span>
            <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
            <h2>Commentaires</h2>
            <?php
            while ($comment = $comments->fetch()) {
            ?>
                <?php $allowed_tags = '<div><img><h1><h2><p><br><strong><em><ul><li>'; ?>
                <p><strong>commented</strong> le <?= $comment['comment_date'] ?></p>
                <h3><?= nl2br(strip_tags($comment['title'],$allowed_tags)); ?></h3>
                <p><?= nl2br(strip_tags($comment['content'],$allowed_tags));?></p>
            <?php
            }
            ?>
            <!-- ... -->
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
        </div>
    </section>
</div>

<!-- ... -->
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>