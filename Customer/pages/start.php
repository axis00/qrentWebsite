<?php
	require "session.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome!</title>
</head>
<body>
	<p><?php echo "$current_session"; ?></p>
	<a href="logout.php"><input type="button" value="Logout"></a>
</body>
</html>