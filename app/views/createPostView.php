<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
<<<<<<< HEAD

<form action="index.php?action=addPost" method="post" style="max-width: 900px;">
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

=======
<section class="inner">
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
</section>
>>>>>>> 64cb12079e7508b13398545b62bb75ca2bf38224
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>