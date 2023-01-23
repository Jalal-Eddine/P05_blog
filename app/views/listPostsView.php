<?php
session_start(); // On démarre la session AVANT toute chose
?>
<?php ob_start(); ?>

<!-- Banner -->
<!-- Note: The "styleN" class below should match that of the header element. -->
<section id="banner" class="style2">
    <div class="inner">
        <span class="image">
            <img src="images/pic07.jpg" alt="" />
        </span>
        <header class="major">
            <h1>My blog Post !</h1>
        </header>
        <div class="content">
            <p>Our last News </p>
        </div>
    </div>
</section>


<?php
while ($data = $posts->fetch()) {
?>
    <!-- Two -->
    <section id="two" class="spotlights">
        <section>
            <a href="index.php?action=post&id=<?= htmlspecialchars($data['id']) ?>" class="image">
                <img src="<?= htmlspecialchars($data['hero_link']) ?>" alt="" data-position="center center" />
            </a>
            <div class="content">
                <div class="inner">
                    <header class="major">
                        <h3><a href="index.php?action=post&id=<?= htmlspecialchars($data['id']) ?>"><?= htmlspecialchars($data['title']) ?></a></h3><br>
                        <em>le <?= htmlspecialchars($data['update_date']) ?></em>
                    </header>
                    <p><?= nl2br(htmlspecialchars($data['excerpt'])) ?></p>
                    <ul class="actions">
                        <li><a href="index.php?action=post&id=<?= htmlspecialchars($data['id']) ?>" class="button">Learn more</a></li>
                    </ul>
                </div>
            </div>
        </section>
    </section>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>