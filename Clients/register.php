<?php
    require "../connectToDb.php";
    $user = "";
    $pass = "";
    $type = "client";
    if(isset($_POST['username']) && isset($_POST['password'])){
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $pass = sha1($pass);
        
        $stmt = $conn->prepare("INSERT INTO users(username,password,type) VALUES(?,?,?)");
        $stmt->bind_param("sss",$user,$pass,$type);
        if($stmt->execute()){
            header("Location:http://qrent/");
        }else{
            echo $stmt->error;
        }
        
        die();

    }
?>

<!DOCTYPE html>
<html>
    <body>
        <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method = 'POST' >
            <input name = "username" type="text" placeholder="username">
            <input name = "password" type="password" placeholder="Password">
            <input type="submit" value="Register">
            <?php
                echo $user . ' ' . $pass;
            ?>
        </form>
    </body>
</html>