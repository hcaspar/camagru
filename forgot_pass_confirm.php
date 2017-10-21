<?php

	include 'fooder.php';
	include 'ft_send_mail.php';

	if ($_POST['submit'] == 'Send Mail')
	{
		$mail = $_POST['mail'];

		$sql = 'SELECT login FROM users WHERE mail == :mail';

		$sth = $newDSN::$conn->prepare ($sql);
		$sth->bindParam (':mail', $mail);
		$sth->execute ();

		$res = $sth->fetch ();

		if ($res)
		{
			$login = $res['login'];

			ft_send_mail_reset ($login, $mail);

			$msg = 'An email has been sent to your adress,<br />
 					please follow the instructions in it';
		}
		else
		{
			$msg = "Email doesn't exist";
		}

	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>SUCCESS</title>
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
