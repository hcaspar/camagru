<?php

	session_start ();

	include "db_connect.php";

	$sql = "SELECT login, password FROM user
			WHERE login='$_POST[enterLogin]' AND password='$_POST[enterPass]'";

	$sth = $conn->prepare($sql);
	$sth->execute();

	$res = $sth->fetchAll();

	$conn = NULL;

	if ($res)
		$_SESSION['userActive'] = TRUE;

	include 'fooder.php';

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Connexion</title>
	</head>
	<body>
		<div class="pop">
			<?php
				if ($res)
					echo "Connected";
				else
					echo "Wrong login or password";
			?>
		</div>
		<a class="pop" href="index.php">HOME</a>
	</body>
</html>
