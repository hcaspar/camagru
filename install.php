<?php

	$DB_DSN = 'sqlite:'.dirname(__FILE__).'/db.sqlite';
	$DB_USER = admin;
	$DB_PASSWORD = admin;

	try
	{
    	$conn = new PDO ($DB_DSN, $DB_USER, $DB_PASSWORD);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	echo "Connection to database established";
 	}
	catch(PDOException $e)
    {
    	echo "Connection to SQLite database failed".$e->getMessage();
    	die();
    }

	$sql = 'CREATE TABLE user (
			id			INTEGER	PRIMARY KEY AUTOINCREMENT,
			login		TEXT	NOT NULL,
			password	TEXT	NOT NULL,
			mail		TEXT	NOT NULL,
			active		BOOLEAN NOT NULL,
			KEY			TEXT	NOT NULL,
			admin		BOOLEAN	NOT NULL
			)';

	$conn->query($sql);

	$conn = NULL;

?>
