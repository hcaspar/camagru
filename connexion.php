<?php include 'fooder.php'; ?>

<!DOCTYPE html>

<html>
	<head>
		<title>Connexion</title>
	</head>
	<body>
		<form class="pop" action="get_user.php" method="post"><br />
			<input type="text" name="enterLogin" value="Login" /><br />
			<input type="text" name="enterPass" value="Password" /><br />
			<input type="submit" name="submit" value="Submit"/><br />
		</form>
		<a class="pop" href="register.php">Register</a>
	</body>
</html>
