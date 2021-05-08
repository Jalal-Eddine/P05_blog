<?php $title = 'Mon blog'; ?>

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
            <p>Our last News :</p>
        </div>
    </div>
</section>
<!-- One -->
<section id="one">
    <div class="inner">
        <header class="major">
            <h2>Sed amet aliquam</h2>
        </header>
        <p>Nullam et orci eu lorem consequat tincidunt vivamus et sagittis magna sed nunc rhoncus condimentum sem. In efficitur ligula tate urna. Maecenas massa vel lacinia pellentesque lorem ipsum dolor. Nullam et orci eu lorem consequat tincidunt. Vivamus et sagittis libero. Nullam et orci eu lorem consequat tincidunt vivamus et sagittis magna sed nunc rhoncus condimentum sem. In efficitur ligula tate urna.</p>
    </div>
</section>

<?php
while ($data = $posts->fetch()) {
?>
    <!-- Two -->
    <section id="two" class="spotlights">
        <section>
            <a href="generic.html" class="image">
                <img src="<?= $data['hero_link'] ?>" alt="" data-position="center center" />
            </a>
            <div class="content">
                <div class="inner">
                    <header class="major">
                        <h3><?= htmlspecialchars($data['title']) ?></h3><br>
                        <em>le <?= $data['updated_date'] ?></em>
                    </header>
                    <p><?= nl2br(htmlspecialchars($data['excerpt'])) ?></p>
                    <ul class="actions">
                        <li><a href="index.php?action=post&id=<?= $data['id'] ?>" class="button">Learn more</a></li>
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