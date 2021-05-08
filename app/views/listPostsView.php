<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>My blog Post !</h1>
<p>Our last News :</p>


<?php
while ($data = $posts->fetch())
{
?>
    <hr>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
        </h3>
        <div><em>le <?= $data['updated_date'] ?></em></div>
        <img src="<?= $data['hero_link']?>" alt="hero image" width="500px">
        <p>
            <?= nl2br(htmlspecialchars($data['excerpt'])) ?>
            <br />
            <em><a href="index.php?action=post&id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>