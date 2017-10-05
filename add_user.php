<?php

	include 'fooder.php';

	$sql = "INSERT INTO user (login, password, mail)
			VALUES ('$_POST[login]', '$_POST[pass]', '$_POST[mail]')";

	$sth = $conn->prepare ($sql);
	$sth->execute ();

	$conn = NULL;

?>

<!DOCTYPE html>
<html>
	<head>
		<title>SUCCESS</title>
	</head>
	<body>
		<div class="pop">
			<?php
				echo $_POST[login]." ".$_POST[pass]." ".$_POST[mail];
 			?>
		</div>
	</body>
</html>
