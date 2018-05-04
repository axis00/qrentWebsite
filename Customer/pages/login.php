<?php
    require('connectToDb.php');
    mysql_select_db($db);

    if(isset($_POST['username'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        //insert query
        $sql = "";
        
        $result = mysql_query($sql);
        
        if(mysql_num_rows($result)==1){
            //direct to login page
            exit();
        }
        else{
            echo "INCORRECT LOGIN INFORMATION!";
            //ncler
            exit();
        }
    }
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Customer Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    </head>
    <body>
        
        <div id="client-login">
            <form action="#" method="post">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password"><input type="reset" value="Reset Fields">
                <input type="submit" value="Login" name="submit" class="login_button"/>
            </form>
        </div>
    </body>
</html>