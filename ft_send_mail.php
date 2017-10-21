<?php

	function ft_send_mail_reset ($login, $email)
	{

		$destinataire = $email;
		$sujet = "Reinitialiser votre mot de passe" ;
		$entete = "From: camagru" ;

		$message = 'Bienvenue sur Camagru,

		Pour reinitialiser votre mot de passe, veuillez cliquer sur le lien ci dessous
		ou copier/coller dans votre navigateur internet.

		http://localhost:8080/reset_pass.php?log='.urlencode($login).'


		---------------
		Ceci est un mail automatique, Merci de ne pas y répondre.';


		mail($destinataire, $sujet, $message, $entete) ;

	}


	function ft_send_mail_activate ($login, $email, $key)
	{

		$destinataire = $email;
		$sujet = "Activer votre compte" ;
		$entete = "From: camagru" ;

		// Le lien d'activation est composé du login(log) et de la clé(cle)
		$message = 'Bienvenue sur Camagru,

		Pour activer votre compte, veuillez cliquer sur le lien ci dessous
		ou copier/coller dans votre navigateur internet.

		http://localhost:8080/activate.php?log='.urlencode($login).'&key='.urlencode($key).'


		---------------
		Ceci est un mail automatique, Merci de ne pas y répondre.';


		mail($destinataire, $sujet, $message, $entete) ;

	}
?>
