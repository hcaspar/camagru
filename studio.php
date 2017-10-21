<?php

	include "fooder.php";

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Studio</title>
	</head>
	<body>
		<form class="pop" action="upload.php" method="post" enctype="multipart/form-data">
			<br>
			<input type="hidden" name="MAX_FILE_SIZE" value="1048576">
			<input type="file" name="img" />
			<input type="submit" value="submit"/>
		</form>
	</body>

</html>
