<!DOCTYPE HTML>
<html>
<?php
    require "../php/session.php";
    ?>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../styles/style.css">
        <link rel="stylesheet" href="../styles/bootstrap-4.0.0/dist/css/bootstrap.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <title>Qrent</title>
    </head>

    <body style=" margin-top: 20vh; background-color: #F7EBEC;">
        <?php include 'nav.html'?>
        <div class="container" style="margin-top:5%;">
            <div class="nav-container">
                <?php include 'nav.html';?>

            </div>

            <table class="table table-bordered">
            <?php
            require "../php/connectToDb.php";
            
            echo "<center><h1>My Profile</h1></center>";
            $sql = "SELECT username, firstname, lastname, email, password FROM qrent.users WHERE username='$checkUser';";
            $results = mysqli_query($conn, $sql);
            $data = mysqli_fetch_array($results);
                $username = $data["username"];
                $firstname = $data["firstname"];
                $lastname = $data["lastname"];
                $email = $data["email"];
                
                echo '<tr>
                    <th scope="col">Username</td>
                    <td>'. $data["username"] .'</td>
                    </tr>
                    <tr>
                    <th scope="col">First Name</td>
                    <td>'. $data["firstname"] .'</td>
                    <tr>
                    <th scope="col">Last Name</td>
                    <td>'. $data["lastname"] .'</td>
                    </tr>
                    <tr>
                    <th scope="col">Email Address</td>
                    <td>'. $data["email"] .'</td>
                    </tr>';
            ?>
            </table>
            <div id="button-reg">
                <center><input type="submit" id="button1" class="btn btn-primary" value="Edit Profile Information"></center>
            </div>
        </div>
    </body>
</html>