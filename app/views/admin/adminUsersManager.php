<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>

<div id="main" class="alt">
    <section id="banner" class="style2">
        <div class="inner">
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
    <div class="table-wrapper">
        <table class="alt">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while($users = $req->fetch()){
                ?>
                    <tr>
                        <td><?php echo $users['first_name'] ?></td>
                        <td><?php echo $users['last_name'] ?></td>
                        <td><?php echo $users['username'] ?></td>
                        <td><?php echo $users['email'] ?></td>
                        <td><?php if($users['user_role_id']==1){echo 'admin';}else {echo 'user';} ?></td>
                    </tr>
                <?php 
                }; 
                ?>
            </tbody>
        </table>
    </div>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>