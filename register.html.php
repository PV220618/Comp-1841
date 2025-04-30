<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" href="/coursework/css/style.css">
	</head>
<body>
			<form action="register.php" method="POST">	
				<h4 class="text-success">Register here...</h4>
				<hr style="border-top:1px groovy #000;">
				<div class="form-group">
					<label>Email</label>
					<input type="text" class="form-control" name="email" />
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" class="form-control" name="username" />
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" />
				</div>
				<br />
				<div class="form-group">
					<button class="btn btn-primary form-control" name="register">Register</button>
				</div>
				<a href="loginindex.php">Login</a>
			</form>
		</div>
	</div>
</body>
</html>