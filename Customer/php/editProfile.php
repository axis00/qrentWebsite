<script type="text/javascript">
    function success() {
        alert("Successfully updated profile");
        window.location.href = "../pages/profile.php";
    }

    function takenEmail() {
        alert("E-mail already taken");
    }

    function takenNumber() {
        alert("Mobile number already taken");
    }
</script>

<?php
    require "session.php";

    if(isset($_POST['email']) && isset($_POST['mobileNumber']) && isset($_POST['addressNo']) && isset($_POST['street']) && isset($_POST['municipality']) && isset($_POST['province']) && isset($_POST['postalCode'])){
        $email = $_POST['email'];
        $number = $_POST['mobileNumber'];
        $addressNo = $_POST['addressNo'];
        $street = $_POST['street'];
        $municipality = $_POST['municipality'];
        $province = $_POST['province'];
        $postalCode = $_POST['postalCode'];

        $validationQuery = "SELECT email FROM users WHERE email = '$email'";
        $results = mysqli_query($conn, $validationQuery);
        $row = mysqli_fetch_array($results, MYSQLI_ASSOC); 
        $count = mysqli_num_rows($results);
        $mail = $row['email'];

        $validationQuery2 = "SELECT contactno FROM customers WHERE contactno = '$number'";
        $results = mysqli_query($conn, $validationQuery2);
        $row = mysqli_fetch_array($results, MYSQLI_ASSOC); 
        $count2 = mysqli_num_rows($results);
        $mNumber = $row['contactno'];
       
        if ($count == 1 && $mail != $session_email) {
            echo "<script>takenEmail()</script>";
            }elseif ($count2 == 1 && $mNumber != $session_contact) {   
                echo "<script>takenNumber()</script>";
                }else{
                    $updateUserQuery = $conn->prepare("UPDATE users SET email = '$email' WHERE username = '$session_username' ");
                    $updateCustomerQuery = $conn->prepare("UPDATE customers SET contactno = '$number', addressno = '$addressNo', street = '$street', municipality = '$municipality', province = '$province', postalcode = '$postalCode' WHERE username = '$session_username' ");

                    if(!$updateUserQuery->execute()){
                        echo $updateUserQuery->error();
                        } elseif (!$updateCustomerQuery->execute()) {
                            echo $updateCustomerQuery->error();
                        }
                echo "<script>success()</script>";
             }
    }
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
    
    <body style=" margin-top: 20vh; background-color: #F7EBEC;">
        <?php include "../pages/nav.html"?>
        <div class="jumbotron">
            <h1>Edit Profile Information</h1>
            <form method="post">
                <div class="form-group">
                    First Name: <input type="text" class="form-control" name="firstName" value="<?php echo "$session_first"; ?>" disabled><br>
            
                    Lastname: <input type="text"class="form-control" name="lastName" value="<?php echo "$session_last"; ?>" disabled><br>
                
                    Username<input type="text" class="form-control" name="username" value="<?php echo "$session_username"; ?>" disabled><br>

                    Email<input type="email" class="form-control" name="email" value="<?php echo "$session_email"; ?>"><br>
            
                    Mobile Number:<input type="text" class="form-control" name="mobileNumber" value="<?php echo "$session_contact"; ?>"><br>
                
                    Password: <a href="changePassword.php"><input type="button" class="btn btn-primary" name="password" value="Change"></a><br><br>
            
                    <p>Birthday: <br>
                        <input type="date" class="form-control" name="birthdate" value="<?php echo "$session_birth"; ?>" disabled><br>
                    </p>
                
                    <p>Address Number: <br>
                        <input type="text" class="form-control" name="addressNo" value="<?php echo "$session_addressNo"; ?>"> <br>
                        
                        Street:<input type="text" class="form-control" name="street"  value="<?php echo "$session_street"; ?>"> <br>
                
                        Municipality:<input type="text" class="form-control" name=" municipality" value="<?php echo "$session_municipality"; ?>"> <br>
            
                        Province:<input type="text" class="form-control" name="province"  value="<?php echo "$session_province"; ?>"> <br>
                            
                        Postal Code:<input type="text" class="form-control" name="postalCode"  value="<?php echo "$session_postal"; ?>"> <br>
                    </p><br>
                        
                    <input type="submit" class="btn btn-primary" value="Save Changes">
                </div>
            </form>
        </div>
    </body>


                       <!--  // $sql = "SELECT customers.username, users.firstname, users.lastname, customers.birthdate, customers.addressno, customers.street, customers.municipality, customers.province, customers.postalcode, customers.contactno, users.email, users.password  FROM qrent.customers inner join users ON customers.username = users.username WHERE users.username='$checkUser';";
                        //     $results = mysqli_query($conn, $sql);
                        //     $data = mysqli_fetch_array($results);

                    // echo 
                    // 'First Name: <input type="text" class="form-control" name="firstName" value="'. $data["firstname"] .'"><br>
            
                    // Lastname: <input type="text"class="form-control" name="lastName" value="'. $data["lastname"] .'"><br>
                
                    // Username<input type="text" class="form-control" name="username" value="'. $data["username"] .'" disabled><br>

                    // Email<input type="email" class="form-control" name="email" value = "'. $data["email"] .'"><br>
            
                    // Mobile Number:<input type="text" class="form-control" name="mobileNumber" value="'. $data["contactno"] .'"><br>
                
                    // Password:<a href="changePassword.php"><input type="button" class="btn btn-primary" name="password" value="Change"></a><br>
                    // <br>
            
                    // <p>Birthday: <br>
                    //     <input type="date" class="form-control" name="birthdate" value="'. $data["birthdate"] .'" disabled><br>
                    // </p>
                
                    // <p>Address Number: <br>
                    //     <input type="text" class="form-control" name="addressNo" value="'. $data["addressno"] .'"> <br>
                        
                    //     Street:<input type="text" class="form-control" name="street" value="'. $data["street"] .'"> <br>
                
                    //     Municipality:<input type="text" class="form-control" name=" municipality" value ="'. $data["municipality"] .'"> <br>
            
                    //     Province:<input type="text" class="form-control" name="province" value="'. $data["province"] .'"> <br>
                            
                    //     Postal Code:<input type="text" class="form-control" name="postalCode" value="'. $data["postalcode"] .'"> <br>
                    // </p>' 
                    require "../php/session.php";
    // $sql = "SELECT customers.username, users.firstname, users.lastname, customers.birthdate, customers.addressno, customers.street, customers.municipality, customers.province, customers.postalcode, customers.contactno, users.email, users.password  FROM qrent.customers inner join users ON customers.username = users.username WHERE users.username='$checkUser';";
    // $results = mysqli_query($conn, $sql);
    // $data = mysqli_fetch_array($results);

    // $username = $data["username"];
    // $first = $data["firstname"];
    // $last = $data["lastname"];
    // $birthday = $data["birthdate"];
    // $email = $data["email"];
    // $mobile = $data["contactno"];
    // $password = $data["password"];
    // $addressNo = $data["addressno"];
    // $street = $data["street"];
    // $municipality = $data["municipality"];
    // $province = $data["province"];
    // $postalCode = $data["postalcode"];
    
    //             $stmt = $conn->prepare("UPDATE `qrent`.`customers` SET `contactno`='$mobile', `birthdate`='$birthday', `addressno`='$addressNo', `street`='$street', `municipality`='$municipality', `province`='$province', `postalcode`='$postalCode' WHERE `username`='$checkUser';");
    //             // $stmt2 = $conn->prepare("UPDATE users SET contactno = '$_POST[]' WHERE username = '$session_username' ");
    //         if(!$stmt->execute()){
    //             echo $stmt->error;
    //             }
    //         // if(!$stmt2->execute()){
    //         //     echo $stmt->error;
    //         //     }-->
</html>




