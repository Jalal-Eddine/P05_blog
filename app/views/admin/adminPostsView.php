<?php ob_start(); ?>
<!-- Banner -->
<!-- Note: The "styleN" class below should match that of the header element. -->
<section id="banner" class="style5">
    <div class="inner">
        <a href="index.php?action=dashboard ">Return to Admin Panel</a>
        <span class="image">
            <img src="public/images/pic07.jpg" alt="" />
        </span>
        <header class="major">
            <h1>Manage Posts</h1>
        </header>
        <div class="content">
            <p>show us your creativity</p>
            <a href="index.php?action=createPost" class="button primary">Create a new post</a>
        </div>
    </div>
</section>
<?php
while ($data = $posts->fetch()) {
?>
    <!-- Two -->
    <section id="two" class="spotlights">
        <section>
            <div class="content">
                <div class="inner">
                    <header class="major">
                        <h3><a href="index.php?action=post&id=<?= htmlspecialchars($data['id'], ENT_COMPAT, 'UTF-8') ?>"><?= htmlspecialchars($data['title'], ENT_COMPAT, 'UTF-8') ?></a></h3>
                    </header>
                    <ul class="actions">
                        <li><a href="index.php?action=post&id=<?= htmlspecialchars($data['id'], ENT_COMPAT, 'UTF-8') ?>" class="button">Display</a></li>
                        <li><a href="index.php?action=modifyPost&id=<?= htmlspecialchars($data['id'], ENT_COMPAT, 'UTF-8') ?>" class="button">Modify</a></li>
                        <li><a href="index.php?action=deletePost&id=<?= htmlspecialchars($data['id'], ENT_COMPAT, 'UTF-8') ?>" class="button">Delete</a></li>
                    </ul>
                </div>
            </div>
        </section>
    </section>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>