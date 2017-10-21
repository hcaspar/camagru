<?php

	include 'fooder.php';

	$msg = "SUCCESS";
	$img = $_FILES['img'];
	$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
	$extension_upload = strtolower (substr (strrchr ($img['name'], '.'), 1));

	if ($img['error'] > 0)
		$msg = "Error uploading your file";
	else if ($img['size'] > $_POST['MAX_FILE_SIZE'])
		$msg = 'File too big';
	else if (!in_array ($extension_upload, $extensions_valides))
		$msg = "File type incorrect";
	else
	{
		if (!file_exists ($_SESSION['user']))
			mkdir($_SESSION['user'], 0777, true);

		$nom = md5 (uniqid (rand (), true));

		$dest = $_SESSION['user']."/{$nom}.{$extension_upload}";

		$sql = 'INSERT INTO pictures (url, owner)
				VALUES (:url, :owner)';

		$sth = $newDSN::$conn->prepare ($sql);
		$sth->execute (array (	':url' => $dest,
 								':owner' => $_SESSION['user']));

		$res = move_uploaded_file($img['tmp_name'], $dest);
		if (!$res)
			$msg = "FAIL";

	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Gallery</title>
	</head>
	<body>
		<div class="pop">
			<br>
			<?php
				print ($msg);
			?>
		</div>
	</body>
</html>
