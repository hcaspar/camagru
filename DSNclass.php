<?php

	class DSNclass
	{
		public static $conn;

		function __construct ()
		{
			try
			{
				$DB_DSN = "sqlite:".dirname(__FILE__)."/db.sqlite";
				$DB_USER = 'admin';
				$DB_PASSWORD = 'admin';

				self::$conn = new PDO ($DB_DSN, $DB_USER, $DB_PASSWORD);
		    	self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		 	}
			catch(PDOException $e)
		    {
		    	echo $e->getMessage()."\n";
		    	die();
		    }

		}

		function TableExists ($table)
		{
			try
			{
				$sql = "SELECT 1 FROM $table";
				self::$conn->query ($sql);
			}
			catch (Exception $e)
			{
				echo $e->getMessage()."\n";
				shell_exec ("rm -rf db.sqlite");
				return FALSE;
			}

			return TRUE;
		}

		function __destruct()
		{
			self::$conn = null;
		}

	}

?>
