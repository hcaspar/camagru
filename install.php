<?php

	include_once 'DSNclass.php';

	if ($argv[1] == 'drop')
	{
		shell_exec ("rm -rf db.sqlite");
		echo "Database droped\n";
		exit ();
	}

	$newDSN = new DSNclass ();

	$sql = 'CREATE TABLE IF NOT EXISTS users(
			id			INTEGER	PRIMARY KEY AUTOINCREMENT,
			login		TEXT	NOT NULL,
			password	TEXT	NOT NULL,
			mail		TEXT	NOT NULL,
			active		BOOLEAN NOT NULL,
			KEY			TEXT			,
			admin		BOOLEAN	NOT NULL
			)';

	$newDSN::$conn->query($sql);

	$sql = 'CREATE TABLE IF NOT EXISTS pictures(
			id			INTEGER	PRIMARY KEY AUTOINCREMENT,
			url			TEXT	NOT NULL,
			owner		INTEGER	NOT NULL
			)';

	$newDSN::$conn->query($sql);

?>
