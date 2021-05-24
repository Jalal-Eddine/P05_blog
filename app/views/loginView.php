<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="public/css/login.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
	<title>LOGIN</title>
</head>

<body>
	<div id="particles-js"></div>

	<body class="login">
		<div class="container">
			<div class="login-container-wrapper clearfix">
				<div class="logo">
					<i class="fa fa-sign-in"></i>
				</div>
				<div class="welcome"><strong>Welcome,</strong> please login</div>

				<form class="form-horizontal login-form" method="post" action="index.php?action=login">
					<div class="form-group relative">
						<input id="login_username" class="form-control input-lg" name="username" type="text" placeholder="Username" required>
						<i class="fa fa-user"></i>
					</div>
					<div class="form-group relative password">
						<input id="login_password" class="form-control input-lg" name="password" type="password" placeholder="Password" required>
						<i class="fa fa-lock"></i>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success btn-lg btn-block">Login</button>
					</div>
				</form>

			</div>

			<h4 class="text-center">
      <a target="_blank" href="index.php?action=register">
        Register
      </a>
    </h4>
		</div>
		<script src="public/js/login.js"></script>
	</body>
</body>

</html>