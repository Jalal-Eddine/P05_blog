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
        <form action="index.php?action=modifyPost&id=<?php echo htmlspecialchars($post['id'], ENT_COMPAT, 'UTF-8'); ?>" method="post">
            <div>
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($post['title'], ENT_COMPAT, 'UTF-8'); ?>" />
            </div><br />
            <div>
                <label for="author">Author</label>
                <select name="author" id="author">
                    <option value="<?php echo htmlspecialchars($post['user_id'], ENT_COMPAT, 'UTF-8'); ?>"><?php echo htmlspecialchars($post['first_name'], ENT_COMPAT, 'UTF-8') . " " . htmlspecialchars($post['last_name'], ENT_COMPAT, 'UTF-8'); ?></option>
                    <?php while ($author = $authors->fetch()) {
                        if ($author['id'] != htmlspecialchars($post['user_id'], ENT_COMPAT, 'UTF-8')) { ?>
                            <option value="<?php echo htmlspecialchars($author['id'], ENT_COMPAT, 'UTF-8'); ?>"><?php echo htmlspecialchars($author['first_name'], ENT_COMPAT, 'UTF-8') . " " . htmlspecialchars($author['last_name'], ENT_COMPAT, 'UTF-8'); ?></option>
                    <?php
                        }
                    } ?>
                </select>
            </div><br />
            <div>
                <label for="hero_link">Hero link</label>
                <input type="text" id="hero_link" name="hero_link" value="<?php echo htmlspecialchars($post['hero_link'], ENT_COMPAT, 'UTF-8') ?>" />
            </div><br />
            <div>
                <label for="excerpt">Excerpt</label>
                <textarea id="excerpt" name="excerpt" rows="5"><?php echo htmlspecialchars($post['excerpt'], ENT_COMPAT, 'UTF-8') ?></textarea>
            </div><br />
            <div>
                <label for="content">Content</label>
                <textarea id="mytextarea" name="content" rows="15"><?php echo htmlspecialchars($post['content'], ENT_COMPAT, 'UTF-8') ?></textarea>
            </div><br />
            <div>
                <input type="submit" />
            </div>
        </form>
    </section>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>