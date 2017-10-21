<?php

	include 'fooder.php';

	$pwd = hash ('whirlpool', $_POST['newPass']);

	$sql = "UPDATE users SET password = :newPass WHERE login == :login";

	$sth = $newDSN::$conn->prepare ($sql);
	$res = $sth->execute (array (	':newPass' => $pwd,
 									':login' => $_SESSION['user']));

	$msg = "Changes saved !";

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Profile</title>
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
