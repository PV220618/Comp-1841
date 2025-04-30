<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" href="/coursework/css/style.css">
	</head>
<body>
		<h3>Login and Registration</h3>
			<?php if(isset($_SESSION['message'])): ?>
				<div <?php echo $_SESSION['message']['alert'] ?> ><?php echo $_SESSION['message']['text'] ?></div>
			<?php 
				endif;
				unset($_SESSION['message']);
			?>
			<form action="login.php" method="POST">	
				<h4>Login here...</h4>
				<div>
					<label>Username</label>
					<input type="text" name="username" />
				</div>
				<div>
					<label>Password</label>
					<input type="password" name="password" />
				</div>
				<br />
				<div>
					<button name="login">Login</button>
				</div>
				<a href="register.php">Registration</a>
			</form>
		</div>
	</div>
</body>
</html>