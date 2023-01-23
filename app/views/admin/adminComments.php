<?php ob_start(); ?>

<div id="main" class="alt">
    <section id="banner" class="style5">
        <div class="inner">
            <a href="index.php?action=dashboard ">Return to Admin Panel</a>
            <span class="image">
                <img src="images/pic07.jpg" alt="" />
            </span>
            <header class="major">
                <h1>Comments</h1>
            </header>
            <div class="content">
                <p>Manage Comments</p>
            </div>
        </div>
    </section>
    <div class="main">
        <div class="inner">
            <div class="table-wrapper">
                <table class="alt">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>title</th>
                            <th>Comment</th>
                            <th>Date</th>
                            <th>Approve</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($comment = $comments->fetch()) {
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($comment['id']) ?></td>
                                <td><?php echo htmlspecialchars($comment['title']) ?></td>
                                <td><?php echo htmlspecialchars($comment['content']) ?></td>
                                <td><?php echo htmlspecialchars($comment['created_date']) ?></td>
                                <td><?php if (htmlspecialchars($comment['comment_status_id']) == 1) { ?>
                                        <form action="" method="post">
                                            <input type="number" name="status" value="1" hidden>
                                            <input type="number" name="id" value="<?php echo htmlspecialchars($comment['id']) ?>" hidden>
                                            <input type="submit" name="submit" value="Unapprove">
                                        </form>
                                    <?php } else { ?>
                                        <form action="" method="post">
                                            <input type="number" name="status" value="2" hidden>
                                            <input type="number" name="id" value="<?php echo htmlspecialchars($comment['id']) ?>" hidden>
                                            <input type="submit" name="submit" value="Approve">
                                        </form>
                                    <?php } ?>
                                </td>
                                <td>
                                    <form action="" method="post">
                                        <input type="number" name="delete_id" value="<?php echo htmlspecialchars($comment['id']) ?>" hidden>
                                        <input class="button primary" type="submit" name="delete" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        <?php
                        };
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>