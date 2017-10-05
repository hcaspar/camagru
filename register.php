<?php include 'fooder.php'; ?>

<!DOCTYPE html>

<html>
	<head>
		<title>Register</title>
	</head>
	<body>
		<form class="pop" action="add_user.php" method="post">
			<input type="text" name="login" value="Login" /><br />
			<input type="text" name="pass" value="Password" /><br />
			<input type="text" name="mail" value="Mail" /><br />
			<input type="submit" name="submit" value="Submit"/>
		</form>
	</body>
</html>
