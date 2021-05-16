<?php
session_start(); // On démarre la session AVANT toute chose
?>
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
            <p>Our last News :<?php if (isset($_SESSION['id']) AND isset($_SESSION['username'])){echo 'Bonjour ' . $_SESSION['username'];}?></p>
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
        <p dir="rtl">فَسَابِقُوا ـ رَحِمَكُمُ اللهُ ـ إِلَى مَنَازِلِكُمْ الَّتِي أُمِرْتُمْ أَنْ تَعْمُرُوهَا، وَالَّتِي رُغِّبْتُمْ فِيهَا، وَدُعِيتُمْ إِلَيْهَا.
            وَاسْتَتِمُّوا نِعَمَ اللهِ عَلَيْكُمْ بِالصَّبْرِ عَلَى طَاعَتِهِ، وَالْـمُجَانَبَةِ لِمَعْصِيَتِهِ، فَإِنَّ غَداً مِنَ الْيَوْمِ قَرِيبٌ.
            مَا أَسْرَعَ السَّاعَاتِ فِي الْيَوْمِ، وَأَسْرَعَ الاَْيَّامَ فِي الشَّهْرِ، وَأَسْرَعَ الشُّهُورَ فِي السَّنَةِ، وَأَسْرَعَ السِّنِينَ فِي الْعُمُرِ!</p>
    </div>
</section>

<?php
while ($data = $posts->fetch()) {
?>
    <!-- Two -->
    <section id="two" class="spotlights">
    <?php
    // if (($data['id']%2)==0) {
    ?>
        <section>
            <a href="index.php?action=post&id=<?= $data['id'] ?>" class="image">
                <img src="<?= $data['hero_link'] ?>" alt="" data-position="center center" />
            </a>
            <div class="content">
                <div class="inner">
                    <header class="major">
                        <h3><a href="index.php?action=post&id=<?= $data['id'] ?>"><?= htmlspecialchars($data['title']) ?></a></h3><br>
                        <em>le <?= $data['updated_date'] ?></em>
                    </header>
                    <p><?= nl2br(htmlspecialchars($data['excerpt'])) ?></p>
                    <ul class="actions">
                        <li><a href="index.php?action=post&id=<?= $data['id'] ?>" class="button">Learn more</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <?php
    // } elseif (($data['id']%2)=0) { 
        ?>
        <section>
            <a href="index.php?action=post&id=<?= $data['id'] ?>" class="image">
                <img src="<?= $data['hero_link'] ?>" alt="" data-position="top center" />
            </a>
            <div class="content">
                <div class="inner">
                    <header class="major">
                        <h3><a href="index.php?action=post&id=<?= $data['id'] ?>"><?= htmlspecialchars($data['title']) ?></a></h3><br>
                        <em>le <?= $data['updated_date'] ?></em>
                    </header>
                    <p><?= nl2br(htmlspecialchars($data['excerpt'])) ?></p>
                    <ul class="actions">
                        <li><a href="index.php?action=post&id=<?= $data['id'] ?>" class="button">Learn more</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <?php 
    // } ?>
    </section>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>