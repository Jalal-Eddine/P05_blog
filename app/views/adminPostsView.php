<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>

<!-- Banner -->
<!-- Note: The "styleN" class below should match that of the header element. -->
<section id="banner" class="style2">
    <div class="inner">
        <span class="image">
            <img src="images/pic07.jpg" alt="" />
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
                        <h3><a href="index.php?action=post&id=<?= $data['id'] ?>"><?= htmlspecialchars($data['title']) ?></a></h3>
                    </header>
                    <ul class="actions">
                        <li><a href="index.php?action=post&id=<?= $data['id'] ?>" class="button">Display</a></li>
                        <li><a href="#" class="button">Modify</a></li>
                        <li><a href="#" class="button">Delete</a></li>
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

<?php require('template.php'); ?>