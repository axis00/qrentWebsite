<script>
    function invalidPassword(){
        alert("Invalid Password, Try Again");
    }

    function invalidUser(){
        alert("Invalid User, Try Again");
    }

    function registrationSuccess(){
        window.location.href = "http://laboratory/pages/home.php"
    }
</script>

<?php
    session_start();
    require "../connectToDb.php";

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $query = "SELECT username,password FROM users WHERE username = '$username'";
        $results = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($results, MYSQLI_ASSOC); 
        $count = mysqli_num_rows($results);
        $passwordVerify = $row['password'];
        
        if($count == 1){
                if(password_verify($password, $passwordVerify)){
                $_SESSION['user'] = $username;
                echo "<script>registrationSuccess()</script>";
                }else{
                echo "<script>invalidPassword()</script>";
                }
            }else{
                echo "<script>invalidUser()</script>";
            }
        }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <link rel="stylesheet" href="css/style.css">
        <title>Qrent</title>
    </head>
    
    <body>
        
        <div class="navigation-bar">
            <div id="login-and-register">
                <form method="post">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" class="button" value="Login">  
                <a href="pages/register.php"><input type="button" class="button" value="Register"></a>
                </form>
            </div>
        </div>
        
        <div class="search-bar">
            <input type="text" class="search-field" name="search" placeholder="Search...">
            <input type="submit" class="search-button"  value="Search">
        </div>
    
    </body>
</html>