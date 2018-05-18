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
            $sql = "SELECT customers.username, users.firstname, users.lastname, customers.birthdate, customers.addressno, customers.street, customers.municipality, customers.province, customers.postalcode, customers.contactno, users.email, users.password  FROM qrent.customers inner join users ON customers.username = users.username WHERE users.username='$checkUser';";
            $results = mysqli_query($conn, $sql);
            $data = mysqli_fetch_array($results);
            
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
                    <th scope="col">Birthdate</td>
                    <td>'. $data["birthdate"] .'</td>
                    </tr>
                    <tr>
                    <th scope="col">Address</td>
                    <td>'. $data["addressno"] .' ' . $data["street"] . ', ' . $data["municipality"] . ', ' . $data["province"] . ', ' . $data["postalcode"] . '</td>
                    </tr>
                    <th scope="col">Contact Number</td>
                    <td>'. $data["contactno"] .'</td>
                    </tr>
                    </tr>
                    <th scope="col">Email Address</td>
                    <td>'. $data["email"] .'</td>
                    </tr>';
            ?>
            </table>
            <div id="button-reg">
                <center><a href="../php/editProfile.php"><input type="submit" id="button1" class="btn btn-primary" value="Edit Profile Information"></a></center>
            </div>
        </div>
    </body>
</html>