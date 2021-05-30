<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
<section id="banner" class="style1">
    <div class="inner">
        <a href="index.php?action=postsManager">Return to Posts Manager</a>
        <span class="image">
            <img src="images/pic07.jpg" alt="" />
        </span>
        <header class="major">
            <h1>Create Post</h1>
        </header>
        <div class="content">
            <p>Manage Posts</p>
        </div>
    </div>
</section>
<div id="main" class="alt">
    <section class="inner">
        <form action="index.php?action=createPost" method="post">
            <div>
                <label for="title">Title</label>
                <input type="text" id="title" name="title" />
            </div><br />
            <div>
                <label for="hero_link">Hero link</label>
                <input type="text" id="hero_link" name="hero_link"></input>
            </div><br />
            <div>
                <label for="excerpt">Excerpt</label>
                <textarea id="excerpt" name="excerpt" rows="5"></textarea>
            </div><br />
            <div>
                <label for="content">Content</label>
                <textarea id="content" name="content" rows="15"></textarea>
            </div><br />
            <div>
                <input type="submit" />
            </div>
        </form>
    </section>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>