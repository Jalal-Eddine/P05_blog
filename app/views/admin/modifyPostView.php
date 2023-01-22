<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>
<section id="banner" class="style5">
    <div class="inner">
        <a href="index.php?action=listPosts ">Return to Posts list</a>
        <span class="image">
            <img src="images/pic07.jpg" alt="" />
        </span>
        <header class="major">
            <h1>Modify Post</h1>
        </header>
        <div class="content">
            <p>Manage Posts</p>
        </div>
    </div>
</section>
<div id="main" class="alt">
    <section class="inner">
        <form action="index.php?action=modifyPost&id=<?php echo $post['id']; ?>" method="post">
            <div>
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="<?php echo $post['title']; ?>" />
            </div><br />
            <div>
                <label for="author">Author</label>
                <select name="author" id="author">
                    <option value="<?php echo $post['user_id']; ?>"><?php echo $post['first_name'] . " " . $post['last_name']; ?></option>
                    <?php while ($author = $authors->fetch()) {
                        if ($author['id'] != $post['user_id']) { ?>
                            <option value="<?php echo $author['id']; ?>"><?php echo $author['first_name'] . " " . $author['last_name']; ?></option>
                    <?php
                        }
                    } ?>
                </select>
            </div><br />
            <div>
                <label for="hero_link">Hero link</label>
                <input type="text" id="hero_link" name="hero_link" value="<?php echo $post['hero_link'] ?>" />
            </div><br />
            <div>
                <label for="excerpt">Excerpt</label>
                <textarea id="excerpt" name="excerpt" rows="5"><?php echo $post['excerpt'] ?></textarea>
            </div><br />
            <div>
                <label for="content">Content</label>
                <textarea id="mytextarea" name="content" rows="15"><?php echo $post['content'] ?></textarea>
            </div><br />
            <div>
                <input type="submit" />
            </div>
        </form>
    </section>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>