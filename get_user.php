<?php

	session_start ();

	include 'DSNclass.php';

	$newPreDSN = new DSNclass ();
	if (!$newPreDSN->TableExists ('users'))
		die ;

	$pwd = hash ('whirlpool', $_POST['pass']);

	$sql = "SELECT login, password, active FROM users
			WHERE login == :login AND password == :pass";

	$sth = $newPreDSN::$conn->prepare($sql);
	$sth->execute(array (	':login' => $_POST['login'],
 							':pass' => $pwd));

	$res = $sth->fetch();

	$newPreDSN::$conn = NULL;

	if (!$res)
		$msg = "Wrong login or password";
	else if ($res['active'] == 0)
		$msg = "Account not active";
	else
	{
		$_SESSION['userActive'] = TRUE;
		$_SESSION['user'] = $_POST['login'];
		$msg = 'Connected';
	}

	include 'fooder.php';

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Connexion</title>
	</head>
	<body>
		<div class="pop">
			<br />
			<?php
				echo $msg;
			?>
			<br />
			<br />
			<a href="index.php">HOME</a>
		</div>
	</body>
</html>
