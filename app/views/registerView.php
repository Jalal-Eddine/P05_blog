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
	<title>Document</title>
</head>

<body>
	<div id="particles-js"></div>

	<body class="login">
		<div class="container">
			<div class="login-container-wrapper clearfix">
				<div class="logo">
					<i class="fa fa-sign-in"></i>
				</div>
				<div class="welcome"><strong>Welcome,</strong> please Register</div>

				<form class="form-horizontal login-form" action="index.php?action=createUser" method="post">
					<div class="form-group relative">
						<input id="first_name" class="form-control input-lg" name="first_name" type="text" placeholder="First name" required>
						<i class="fa fa-user"></i>
					</div>
					<div class="form-group relative">
						<input id="last_name" class="form-control input-lg" name="last_name" type="text" placeholder="Last name" required>
						<i class="fa fa-user"></i>
					</div>
					<div class="form-group relative">
						<input id="username" class="form-control input-lg" name="username" type="text" placeholder="Username" required>
						<i class="fa fa-user"></i>
					</div>
					<div class="form-group relative">
						<input id="email" class="form-control input-lg" name="email" type="email" placeholder="Email" required>
						<i class="fa fa-"></i>
					</div>
					<div class="form-group relative password">
						<input id="password" class="form-control input-lg" name="passeword" type="password" placeholder="Password" required>
						<i class="fa fa-lock"></i>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success btn-lg btn-block">Register</button>
					</div>
				</form>
			</div>

			<!-- <h4 class="text-center">
      <a target="_blank" href="https://codepen.io/Peeyush200/pen/mLwvJB">
        Check out Social login form 
      </a>
    </h4> -->
		</div>
		<script src="public/js/login.js"></script>
	</body>
</body>

</html>