<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>

<form action="index.php?action=addPost" method="post">
    <div>
        <label for="title">Title</label><br />
        <input type="text" id="title" name="title" />
    </div>
    <div>
        <label for="hero_link">Hero link</label><br />
        <input type="text" id="hero_link" name="hero_link"></input>
    </div>
    <div>
        <label for="excerpt">Excerpt</label><br />
        <textarea id="excerpt" name="excerpt"></textarea>
    </div>
    <div>
        <label for="content">Content</label><br />
        <textarea id="content" name="content"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>