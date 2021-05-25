<?php
session_start();
if(isset($_SESSION['id'])){
	$connected = $_SESSION['id'] ;
	$role = $_SESSION['role'];
	}else{
		$connected= 0;
		$role=0;
	}
?>
<?php ob_start(); ?>
<!-- Banner -->
<section id="banner" class="major">
	<div class="inner">
		<header class="major">
			<h1>Hi, my name is Jalal Eddine</h1>
		</header>
		<div class="content">
			<p>The developer that you need !</p>
		</div>
	</div>
</section>
<!-- Main -->
<div id="main">
	<!-- One -->
	<section id="one" class="tiles">
		<article>
			<span class="image">
				<img src="images/pic01.jpg" alt="" />
			</span>
			<header class="major">
				<h3><a href="index.php?action=listPosts" class="link">Blog</a></h3>
				<p>browes my lasts article</p>
			</header>
		</article>
		<article>
			<span class="image">
				<img src="images/pic02.jpg" alt="" />
			</span>
			<header class="major">
				<h3><a href="https://jalaleddine.xyz/resume" class="link" target="_blank">My Resume</a></h3>
				<p>Know more about me</p>
			</header>
		</article>
		<?php if($role ==1){?>
		<article>
			<span class="image">
				<img src="images/pic03.jpg" alt="" />
			</span>
			<header class="major">
				<h3><a href="index.php?action=dashboard" class="link">Admin Panel</a></h3>
				<p>Manage blog posts</p>
			</header>
		</article>
		<article>
			<span class="image">
				<img src="images/pic04.jpg" alt="" />
			</span>
			<header class="major">
				<h3><a href="index.php?action=users" class="link">Users</a></h3>
				<p>Manage Users</p>
			</header>
		</article>
		<?php }?>
	</section>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>