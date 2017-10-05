<?php

	try
	{
    	$conn = new PDO ('sqlite:'.dirname(__FILE__).'/db.sqlite');
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 	}
	catch(PDOException $e)
    {
    	echo "Connection to SQLite database failed".$e->getMessage();
    	die();
    }

?>
