<?php

	session_start ();

	session_unset();

	session_destroy();

	include "fooder.php";

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Disconected</title>
	</head>
	<body>
		<br />
		<div class="pop">
			Successfully disconnected
			<br />
			<br />
			<a href="index.php">HOME</a>
		</div>
	</body>
</html>
