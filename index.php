<?php

	include "fooder.php";

	$sql = 'SELECT * FROM pictures';

	$sth = $newDSN::$conn->prepare ($sql);
	$sth->execute ();

	$res = $sth->fetchAll ();

	if ($res)
	{
		for ($i = 0; $i < sizeof($res); $i++)
		{
			if (!file_exists ($res[$i]['url']))
			{
				$sql = 'DELETE FROM pictures WHERE id == :id';

				$sth = $newDSN::$conn->prepare ($sql);
				$sth->bindParam (':id', $res[$i]['id']);
				$sth->execute ();
			}
			else
				break;
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Camagru</title>
	</head>
	<body>
		<div class="pop">
			<img <?php echo "src =".$res[$i]['url']; ?> alt="">
		</div>
	</body>

</html>
