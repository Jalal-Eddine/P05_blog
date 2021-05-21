<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
<?php $data = $posts->fetch();?>
<section class="inner" style="max-width:900px">
    <form action="index.php?action=modifyPost&id=<?php echo $data['id']; ?>" method="post" >
        <div>
            <label for="title" >Title</label><br />
            <input type="text" id="title" name="title" value="<?php echo $data['title']; ?>"/>
        </div>
        <div>
            <label for="hero_link">Hero link</label><br />
            <input type="text" id="hero_link" name="hero_link" value="<?php echo $data['hero_link'] ?>"/>
        </div>
        <div>
            <label for="excerpt">Excerpt</label><br />
            <textarea id="excerpt" name="excerpt" ><?php echo $data['excerpt'] ?></textarea>
        </div>
        <div>
            <label for="content">Content</label><br />
            <textarea id="content" name="content"><?php echo $data['content'] ?></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>