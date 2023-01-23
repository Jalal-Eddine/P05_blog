<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>

<div id="main" class="alt">
    <section id="banner" class="style5">
        <div class="inner">
            <a href="index.php?action=dashboard ">Return to Admin Panel</a>
            <span class="image">
                <img src="images/pic07.jpg" alt="" />
            </span>
            <header class="major">
                <h1>Users</h1>
            </header>
            <div class="content">
                <p>Manage Users</p>
            </div>
        </div>
    </section>
    <div class="main">
        <div class="inner">
            <div class="table-wrapper">
                <table class="alt">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                            <th>email</th>
                            <th>Modify Role</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($users = $req->fetch()) {
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($users['first_name']) ?></td>
                                <td><?php echo htmlspecialchars($users['last_name']) ?></td>
                                <td><?php echo htmlspecialchars($users['username']) ?></td>
                                <td><?php echo htmlspecialchars($users['email']) ?></td>
                                <td><?php if (htmlspecialchars($users['user_role_id']) == 1) { ?>
                                        <form action="" method="post">
                                            <input type="number" name="user_role" value="1" hidden>
                                            <input type="number" name="id" value="<?php echo htmlspecialchars($users['id']) ?>" hidden>
                                            <input type="submit" name="submit" value="admin">
                                        </form>
                                    <?php } else { ?>
                                        <form action="" method="post">
                                            <input type="number" name="user_role" value="2" hidden>
                                            <input type="number" name="id" value="<?php echo htmlspecialchars($users['id']) ?>" hidden>
                                            <input type="submit" name="submit" value="user">
                                        </form>
                                    <?php } ?>
                                </td>
                                <td>
                                    <form action="" method="post">
                                        <input type="number" name="delete_id" value="<?php echo htmlspecialchars($users['id']) ?>" hidden>
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