<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>

<div id="main" class="alt">
    <div class="table-wrapper">
        <table class="alt">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>email</th>
                    <th>passeword</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($data = $users->fetch()) {
                ?>
                    <tr>
                        <td><?php echo $data['first_name'] ?></td>
                        <td><?php echo $data['last_name'] ?></td>
                        <td><?php echo $data['username'] ?></td>
                        <td><?php echo $data['email'] ?></td>
                        <td><?php echo $data['passeword'] ?></td>
                    </tr>
                <?php }; ?>
            </tbody>
        </table>
    </div>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>