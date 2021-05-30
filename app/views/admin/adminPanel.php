<?php ob_start(); ?>

<section id="banner" class="style5">
    <div class="inner">
        <span class="image">
            <img src="images/pic07.jpg" alt="" />
        </span>
        <header class="major">
            <h1>Admin Panel</h1>
        </header>
        <div class="content">
            <p>Manage your blog</p>
        </div>
    </div>
</section>
<div class="main">
    <div class="inner">
    <a href="index.php?action=postsManager" class="button primary large">Posts Manager</a>
    <a href="index.php?action=users" class="button primary large">Users</a>
    <a href="index.php?action=comments" class="button primary large">Manage Comments</a>
    <a href="index.php" class="button primary large">Home Page</a>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>