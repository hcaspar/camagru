<?php

	include 'fooder.php';
	include 'ft_send_mail.php';

	if ($_POST['submit'] == 'Submit')
	{
		$login = $_POST['login'];
		$pwd = $_POST['pass'];
		$mail = $_POST['mail'];

		if (!$login || !$pwd || !$mail)
			$msg = 'All fields required';
		else
		{
			$sql = "SELECT * FROM users WHERE login == :login OR mail == :mail";

			$sth = $newDSN::$conn->prepare ($sql);
			$sth->bindParam (':login', $login);
			$sth->bindParam (':mail', $mail);
			$sth->execute ();

			$res = $sth->fetch ();

			if ($res['login'] == $login)
				$msg = 'Login already exists';
			else if ($res['mail'] == $mail)
				$msg = 'Mail already used';
			else
			{
				$key = md5 (microtime (TRUE) * 100000);
				$pwd = hash ('whirlpool', $pwd);

				$sql = "INSERT INTO users (login, password, mail, active, KEY, admin)
						VALUES (:login, :pass, :mail, 0, :key, 0)";

				$sth = $newDSN::$conn->prepare ($sql);
				$sth->execute (array (	':login' => $login,
										':pass' => $pwd,
										':mail' => $mail,
										':key' => $key));

				$msg = "Account created successfully <br />
						An email has been sent to you <br />
						Click the link in it to activate your account";

				ft_send_mail_activate ($login, $mail, $key);
			}
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
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
