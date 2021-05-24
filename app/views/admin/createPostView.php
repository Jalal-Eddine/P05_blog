<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
<section class="inner" style="max-width:900px">
    <form action="index.php?action=createPost" method="post" >
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
</section>
<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>