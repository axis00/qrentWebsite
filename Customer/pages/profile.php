<?php
	require "../php/session.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    <link rel="stylesheet" href="../styles/bootstrap-4.0.0/dist/css/bootstrap.css">-->
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <div class="navigation-bar">
            <div class="nav-element">
                <a href="home.php"><img  src="../images/qrent-logo.png"></a>
            </div>
            <div id="user" class="nav-element">
                <a href="profile.php">
                    <?php
                    echo "$current_session";
                    ?>
                </a>
                <div class="nav-element" id="logout">
                    <a href="../php/logout.php"><input class="search-button" type="button" value="Logout" id="logout-button"></a>
                </div>
            </div>
            <div id="search">
                <form action="/action_page.php">
                      <input type="text" placeholder="Search.." name="search">
                      <button type="submit">Submit</button>
                </form>
            </div>

        </div>
    <div class="#sidenav">
    </div>
    <div class="content">
<!--
        <h2>Account Information:</h2>
            
            <h3>First name: </h3>
            <?php
                $firstname = mysqli_query($conn, "SELECT firstname FROM users where username = '$checkUser';");
                echo "$firstname";
            ?>
            <br/>
        <h3>Last name:</h3>
            <?php
                $lastname= mysqli_query($conn, "SELECT lastname FROM users where username = '$checkUser';");
                echo "$flastname";
            ?>
-->
    </div>
</body>
</html>