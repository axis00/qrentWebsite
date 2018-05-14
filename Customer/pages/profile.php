<?php
	//require "session.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<!--
	<p>
        <?php
        //echo "$current_session"; 
        ?>
    </p>
-->
    <div class="navigation-bar">
        <div class="nav_header">
            <h1><?php
                //echo "$current_session";
            ?>
                My Profile <!--remove this line-->
            </h1>
        </div>
        <div id="logout">
            <a href="logout.php"><input type="button" value="Logout"></a>
        </div>
    </div>
        
    
    
</body>
</html>