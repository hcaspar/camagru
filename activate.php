<?php

	include 'fooder.php';

	$login = $_GET['log'];
	$key = $_GET['key'];

	$sql = ("SELECT key, active FROM users WHERE login == :login ");

	$sth = $newDSN::$conn->prepare ($sql);
	$sth->execute (array (':login' => $login));
	$res = $sth->fetch ();

	if ($res)
	{
		$clebdd = $res['KEY'];	// Récupération de la clé
		$active = $res['active']; // $actif contiendra alors 0 ou 1
	}

	if ($active == 1) // Si le compte est déjà actif on prévient
	{
		$msg = "Account already active !";
	}
	else // Si ce n'est pas le cas on passe aux comparaisons
	{
		if ($key == $clebdd) // On compare nos deux clés
		{
			// Si elles correspondent on active le compte !
			$msg = "Account activated !";

			// La requête qui va passer notre champ actif de 0 à 1
			$sql = "UPDATE users SET active = 1, key = NULL WHERE login == :login";
			$sth = $newDSN::$conn->prepare ($sql);
			$sth->bindParam(':login', $login);
			$sth->execute ();
		}
		else // Si les deux clés sont différentes on provoque une erreur...
		{
			$msg = "Error";
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Activation</title>
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
