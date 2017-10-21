<?php

	session_start();

	include_once 'DSNclass.php';

	$newDSN = new DSNclass ();
	if (!$newDSN->TableExists ('users'))
		die ;

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
			<?php if ($_SESSION['userActive']): ?>
				<a href="profile.php"><div class="button">PROFILE</div></a>
				<a href="studio.php"><div class="button">STUDIO</div></a>
				<a href="disconnect.php"><div class="button right">SIGN OUT</div></a>
			<?php else: ?>
				<a href="connexion.php"><div class="button right">SIGN IN</div></a>
			<?php endif; ?>
		</div>
	</body>
</html>
