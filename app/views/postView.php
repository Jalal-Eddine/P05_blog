<?php ob_start(); ?>


<div id="main" class="alt">

    <!-- One -->
    <section id="one">
        <div class="inner">
            <p><a href="index.php?action=listPosts">Return to posts list</a></p>
            <header class="major">
                <h1><?= htmlspecialchars($post['title'], ENT_COMPAT, 'UTF-8') ?></h1><br>
                <em>date: <?= htmlspecialchars($post['update_date'], ENT_COMPAT, 'UTF-8') ?></em><br>
                <em>by <?= htmlspecialchars($post['first_name'], ENT_COMPAT, 'UTF-8') . " " . htmlspecialchars($post['last_name'], ENT_COMPAT, 'UTF-8')  ?></em>
            </header>
            <span class="image main"><img src="<?= htmlspecialchars($post['hero_link'], ENT_COMPAT, 'UTF-8') ?>" alt="" /></span>
            <?php $allowed_tags = '<div><img><h1><h2><p><br><strong><em><ul><li>'; ?>
            <?= nl2br(strip_tags($post['content'], $allowed_tags)) ?>
            <h2>Comments</h2>
            <?php
            while ($comment = $comments->fetch()) {
                if (htmlspecialchars($comment['comment_status_id'], ENT_COMPAT, 'UTF-8') == 1) {
            ?>
                    <?php $allowed_tags = '<div><img><h1><h2><p><br><strong><em><ul><li>'; ?>
                    <p>commented the <?= htmlspecialchars($comment['comment_date'], ENT_COMPAT, 'UTF-8') ?></p>
                    <h3><?= nl2br(strip_tags($comment['title'], $allowed_tags)); ?></h3>
                    <p><?= nl2br(strip_tags($comment['content'], $allowed_tags)); ?></p>
                <?php
                }
            }
            if (isset($_SESSION['id'])) {
                ?>
                <!-- ... -->
                <form action="index.php?action=addComment&amp;id=<?= htmlspecialchars($post['id'], ENT_COMPAT, 'UTF-8') ?>" method="post">
                    <div>
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" />
                    </div><br />
                    <div>
                        <label for="content">Comment</label>
                        <textarea id="content" name="content"></textarea>
                    </div><br />
                    <div>
                        <input type="submit" />
                    </div>
                </form>
            <?php
            } else {
            ?>
                <p><a href="index.php?action=register">Register</a> to add a comment</p>
            <?php } ?>
        </div>
    </section>
</div>

<!-- ... -->
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>