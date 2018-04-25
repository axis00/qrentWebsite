<!DOCTYPE html>
<html>
    <body>
        <?php
        	session_start();
        	
        	if(isset($_SESSION['user'])){
				echo $_SESSION['user'];
				echo '	<form method="get" action="logout.php">
							<input type="submit" name="logout" value="logout">
						</form>';
			}else{
				echo "welcome";
			}
		?>

    </body>
</html>