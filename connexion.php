<?php include 'fooder.php'; ?>

<!DOCTYPE html>

<html>
	<head>
		<title>Connexion</title>
	</head>
	<body>
		<form class="pop" action="get_user.php" method="post"><br />
			<input type="text" name="login" value="Login" /><br />
			<input type="password" name="pass" value="Password" /><br />
			<input type="submit" name="submit" value="Submit" /><br />
			<br />
			<a href="register.php">Register</a>
			<br>
			<a href="forgot_pass.php">Forgot password</a>
		</form>
	</body>
</html>
