<?php

	session_start ();

	$_SESSION['userActive'] = FALSE;

	include ("fooder.php");

	$conn = null;

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Disconected</title>
	</head>
	<body>
		<div class="pop">
			Successfully disconnected
		</div>
		<a class="pop" href="index.php">HOME</a>
	</body>
</html>
