<script>
    function invalidPassword(){
        alert("Invalid Password");
    }

    function invalidUser(){
        alert("User not registered");
    }

    function registrationSuccess(){
        window.location.href = "http://laboratory/pages/home.php"
    }
</script>

<?php
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
        <link rel="stylesheet" href="styles/bootstrap-4.0.0/dist/css/bootstrap.css">
        <link rel="stylesheet" href="styles/style.css">
        <title>Qrent</title>
    </head>
    
    <body>
        
        <div class="jumbotron">
                <form method="post">
                    <img src="images/qrent-logo.png"><br><br>
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username"><br>
                        <input type="password" class="form-control" id="password"  name="password" placeholder="Password"><br>
                    </div>

                     <input type="submit" class="btn btn-primary" value="Login"><br><br>
                    <p>Not yet registerd? <a href="pages/register.php">Register here.</a></p>
                </form>
            </div>
            
    </body>
</html>