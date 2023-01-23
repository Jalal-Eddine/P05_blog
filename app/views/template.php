<?php
if (isset($_SESSION['id'])) {
    $connected = $_SESSION['id'];
    $role = $_SESSION['role'];
} else {
    $connected = 0;
    $role = 0;
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Blog post OC-Project 05</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="public/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="public/css/noscript.css" />
    </noscript>

</head>

<body class="is-preload">
    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <header id="header" class="alt">
            <a href="index.php" class="logo"><strong>MyBlog</strong> <span><?php if (isset($_SESSION['id']) and isset($_SESSION['username'])) {
                                                                                echo 'Bonjour ' . $_SESSION['first_name'];
                                                                            } ?></span></a>
            <nav>
                <a href="#menu">Menu</a>
            </nav>
        </header>

        <!-- Menu -->
        <nav id="menu">
            <ul class="links">
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php?action=listPosts">List of blog Post</a></li>
                <?php if ($role == 1) { ?>
                    <li><a href="index.php?action=dashboard">Admin Panel</a></li>
                <?php } ?>
            </ul>
            <ul class="actions stacked">
                <?php if (!$connected) { ?>
                    <li><a href="index.php?action=login" class="button fit">Log In</a></li>
                <?php } else { ?>
                    <li><a href="index.php?action=logout" class="button fit">Log Out</a></li>
                <?php } ?>
            </ul>
        </nav>

        <?= $content ?>
        <!-- Contact -->
        <section id="contact">
            <div class="inner">
                <section>
                    <form method="post" action="mailer.php">
                        <div class="fields">
                            <div class="field half">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" />
                            </div>
                            <div class="field half">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" />
                            </div>
                            <div class="field">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" rows="6"></textarea>
                            </div>
                        </div>
                        <ul class="actions">
                            <li><input type="submit" value="Send Message" class="primary" /></li>
                            <li><input type="reset" value="Clear" /></li>
                        </ul>
                    </form>
                </section>
                <section class="split">
                    <section>
                        <div class="contact-method">
                            <span class="icon solid alt fa-envelope"></span>
                            <h3>Email</h3>
                            <a href="#">contact@gmail.com</a>
                        </div>
                    </section>
                    <section>
                        <div class="contact-method">
                            <span class="icon solid alt fa-phone"></span>
                            <h3>Phone</h3>
                            <span>0621547892</span>
                        </div>
                    </section>
                    <section>
                        <div class="contact-method">
                            <span class="icon solid alt fa-home"></span>
                            <h3>Address</h3>
                            <span> 20 Rue xxxx <br />
                                Creil<br />
                                France</span>
                        </div>
                    </section>
                </section>
            </div>
        </section>
        <!-- Footer -->
        <footer id="footer">
            <div class="inner">
                <ul class="icons">
                    <li><a href="https://twitter.com/HabbaziJalal" class="icon brands alt fa-twitter" target="_blank><span class=" label">Twitter</span></a></li>
                    <li><a href="https://github.com/Jalal-Eddine" class="icon brands alt fa-github" target="_blank><span class=" label">GitHub</span></a></li>
                    <li><a href="https://www.linkedin.com/in/jalaleddine/" class="icon brands alt fa-linkedin-in" target="_blank><span class=" label">LinkedIn</span></a></li>
                </ul>
                <ul class="copyright">
                    <li>&copy; JalalEddine</li>
                    <li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
                </ul>
            </div>
        </footer>

    </div>
    <!-- Scripts -->
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/jquery.scrolly.min.js"></script>
    <script src="public/js/jquery.scrollex.min.js"></script>
    <script src="public/js/browser.min.js"></script>
    <script src="public/js/breakpoints.min.js"></script>
    <script src="public/js/util.js"></script>
    <script src="public/js/main.js"></script>
</body>

</html>