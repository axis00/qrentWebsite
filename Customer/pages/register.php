<script>
    function passwordValidationF()
    {
        alert("Password does not match");
        window.location.href = "http://laboratory/pages/register.php";
    }
    
    function successfull()
    {
        alert("Registration Success!");
        window.location.href = "http://laboratory/";
    }
</script>

<?php
        
        require "../../connectTodb.php";

        if( isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['birthday']) && isset($_POST['email']) && isset($_POST['mobileNumber']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['verifyPassword']) && isset($_POST['addressNo']) && isset($_POST['street']) && isset($_POST['municipality']) && isset($_POST['province']) && isset($_POST['postalCode'])){
            $first = $_POST['firstName'];
            $last = $_POST['lastName'];
            $birthday = $_POST['birthday'];
            $email = $_POST['email'];
            $mobile = $_POST['mobileNumber'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $verifyPassword = $_POST['verifyPassword'];
            $addressNo = $_POST['addressNo'];
            $street = $_POST['street'];
            $municipality = $_POST['municipality'];
            $province = $_POST['province'];
            $postalCode = $_POST['postalCode'];
            $registration_date = date("Y/m/d");
            $type = "Client";
            $addressType = "Home";
            $status = "pending";
            $addressId = 10000;
            $query = "SELECT addressID FROM Address";
            $results = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($results, MYSQLI_ASSOC); 
            $count = mysqli_num_rows($results);
            $addIdgen = $row['addressID'];
            
             
            if($verifyPassword != $password){
                echo "<script>passwordValidationF()</script>";
            }else{
                $password = password_hash($password, PASSWORD_DEFAULT); 
                $stmt = $conn->prepare("INSERT INTO users(username, password, type, firstname, lastname, email, status, registrationdate) VALUES(?,?,?,?,?,?,?,NOW())");
                $stmt->bind_param("sssssss", $username, $password, $type, $first, $last, $email, $status);
                
            while ($addressId == $addIdgen){
                $addressId++;                
            }
                $stmt1 = $conn->prepare("INSERT INTO Address(addressID, addressNo, street, municipality, province, postalCode, addressType) VALUES(?,?,?,?,?,?,?)");
                $stmt1->bind_param("sssssss", $addressId, $addressNo, $street, $municipality, $province, $postalCode, $addressType);

                if(!$stmt->execute() || !$stmt1->execute()){
                    echo $stmt->error;
                    echo $stmt1->error;
                }
                    echo "<script>successfull()</script>";
                }
        }
    ?>

<!DOCTYPE HTML>
<html>
    
    <head>
        <title>Qrent</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    
    <body>
        <div class="navigation-bar" id="title">
            <p>
                <a href="../index.php"><input type="button" class="button-register" id="return" value="Back"></a>
                REGISTRATION FORM
            </p>
        </div>
        
        <div class="content-register">
            <form action="register.php" method="post">
                <div class="register-field">          
                    <input type="text" name="firstName" placeholder="First Name"><br>
            
                    <input type="text" name="lastName" placeholder="Last Name"><br>
                
                    <input type="email" name="email" placeholder="E-mail Address"><br>
            
                    <input type="text" name="mobileNumber" placeholder="Mobile Number"><br>
            
                    <input type="text" name="username" placeholder="Username"><br>
            
                    <input type="password" name="password" placeholder="Password"><br>
            
                    <input type="password" name="verifyPassword" placeholder="Re-enter Password"><br>
            
                    <p>Birthday: <br>
                        <input type="date" name="birthday"><br>
                    </p>
                
                    <p>Address: <br>
                        <input type="text" name="addressNo" placeholder="Address Number"> <br>
                        
                        <input type="text" name="street" placeholder="Street"> <br>
                
                        <input type="text" name=" municipality" placeholder="Municipality"> <br>
            
                        <input type="text" name="province" placeholder="Province"> <br>
                            
                        <input type="text" name="postalCode" placeholder="Postal Code"> <br>
                    </p>
                </div>
                
                <div id="button-reg">
                    <a href="home.php"><input type="submit" class="button-register" value="Register"></a> <a href="../index.php"><input type="button" class="button-register" value="return"></a>
                </div>
            </form>
        </div>

    </body>
</html>