<?php
    require "../php/session.php";
    $sql = "SELECT customers.username, users.firstname, users.lastname, customers.birthdate, customers.addressno, customers.street, customers.municipality, customers.province, customers.postalcode, customers.contactno, users.email, users.password  FROM qrent.customers inner join users ON customers.username = users.username WHERE users.username='$checkUser';";
    $results = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($results);

    $username = $data["username"];
    $first = $data["firstname"];
    $last = $data["lastname"];
    $birthday = $data["birthdate"];
    $email = $data["email"];
    $mobile = $data["contactno"];
    $password = $data["password"];
    $addressNo = $data["addressno"];
    $street = $data["street"];
    $municipality = $data["municipality"];
    $province = $data["province"];
    $postalCode = $data["postalcode"];
    
                $stmt = $conn->prepare("UPDATE `qrent`.`customers` SET `contactno`='$mobile', `birthdate`='$birthday', `addressno`='$addressNo', `street`='$street', `municipality`='$municipality', `province`='$province', `postalcode`='$postalCode' WHERE `username`='$checkUser';");
                $stmt2 = $conn->prepare("UPDATE `qrent`.`users` SET `username`='$username', `firstname`='$first', `lastname`='$last', `email`='$email' WHERE `username`='$checkUser';");
            if(!$stmt->execute()){
                echo $stmt->error;
                }
            if(!$stmt2->execute()){
                echo $stmt->error;
                }
                $_SESSION['user'] = $username;
    ?>

<!DOCTYPE HTML>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../styles/bootstrap-4.0.0/dist/css/bootstrap.css">
        <link rel="stylesheet" href="../styles/style.css">
        <title>Qrent</title>
    </head>
    
    <body>
            <div class="jumbotron">
                <h1>Edit Profile Information</h1>
            <form action="editProfile.php" method="post">
                <div class="form-group">

                    <?php
                        
                        $sql = "SELECT customers.username, users.firstname, users.lastname, customers.birthdate, customers.addressno, customers.street, customers.municipality, customers.province, customers.postalcode, customers.contactno, users.email, users.password  FROM qrent.customers inner join users ON customers.username = users.username WHERE users.username='$checkUser';";
                            $results = mysqli_query($conn, $sql);
                            $data = mysqli_fetch_array($results);

                    echo 
                    'First Name: <input type="text" class="form-control" name="firstName" value="'. $data["firstname"] .'"><br>
            
                    Lastname: <input type="text"class="form-control" name="lastName" value="'. $data["lastname"] .'"><br>
                
                    Username<input type="text" class="form-control" name="username" value="'. $data["username"] .'"><br>

                    Email<input type="email" class="form-control" name="email" value = "'. $data["email"] .'"><br>
            
                    Mobile Number:<input type="text" class="form-control" name="mobileNumber" value="'. $data["contactno"] .'"><br>
            
                    Password:<input type="submit" class="btn btn-primary" name="password" value="Change"><br>
            
                    <p>Birthday: <br>
                        <input type="date" class="form-control" name="birthday" value="'. $data["birthdate"] .'"><br>
                    </p>
                
                    <p>Address Number: <br>
                        <input type="text" class="form-control" name="addressNo" value="'. $data["addressno"] .'"> <br>
                        
                        Street:<input type="text" class="form-control" name="street" value="'. $data["street"] .'"> <br>
                
                        Municipality:<input type="text" class="form-control" name=" municipality" value ="'. $data["municipality"] .'"> <br>
            
                        Province:<input type="text" class="form-control" name="province" value="'. $data["province"] .'"> <br>
                            
                        Postal Code:<input type="text" class="form-control" name="postalCode" value="'. $data["postalcode"] .'"> <br>
                    </p>'
                    ?>
                </div>
                
                <div id="button-reg">
                    <a href="../pages/profile.php"><input type="submit" class="btn btn-primary" value="Save Changes"></a>
                </div>
            </form>
            </div>
    </body>
</html>

