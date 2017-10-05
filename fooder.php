<?php

	session_start();

	include "db_connect.php";
?>

<!DOCTYPE html>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<meta charset="utf-8" />
	</head>
	<body>
		<div class="banner header">
			<a href="index.php"><div class="button">HOME</div></a>
			<div class="button">PROFILE</div>
			<?php if ($_SESSION['userActive']): ?>
					<a href="disconnect.php"><div class="button right">SIGN OUT</div></a>
			<?php else: ?>
					<a href="connexion.php"><div class="button right">SIGN IN</div></a>
			<?php endif; ?>
		</div>
	</body>
</html>
