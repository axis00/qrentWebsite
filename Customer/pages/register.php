    <?php
        /*    
        function validatePassword($pass1,$pass2){
            ifSame == strcmp($pass1,$pass2);
                if ($ifSame != 0){
                    echo "Password Does not Match!";
                }
        }
        */
        
        require "../../connectTodb.php";
        $first = "";
        $last = "";
        $birthday = "";
        $email = "";
        $mobile = "";
        $username = "";
        $password = "";
        $addressType = "";
        $street = "";
        $municipality = "";
        $province = "";
        $postalCode = "";

        if( isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['birthday']) && isset($_POST['email']) && isset($_POST['mobileNumber']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['addressType']) && isset($_POST['street']) && isset($_POST['municipality']) && isset($_POST['province']) && isset($_POST['postalCode'])){
            $first = $_POST['firstName'];
            $last = $_POST['lastName'];
            $birthday = $_POST['birthday'];
            $email = $_POST['email'];
            $mobile = $_POST['mobileNumber'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password = sha1($password);
            $addressType = $_POST['addressType'];
            $street = $_POST['street'];
            $municipality = $_POST['municipality'];
            $province = $_POST['province'];
            $postalCode = $_POST['postalCode'];
            $type = "Customer";
            $status = "pending";

             
            $stmt = $conn->prepare("INSERT INTO users(username, password, type, firstname, lastname, email, status ) VALUES(?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssss", $username, $password, $type, $first, $last, $email, $status);

        if(!$stmt->execute()){
                     echo $stmt->error;   
        }
            
        }

    ?>

<!DOCTYPE HTML>
<html>
    
    <head>
        <title>Registration</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    
    <body>
        
        <form action="register.php" method="post">
            
            <p>First Name: <br>
            <input type="text" name="firstName" placeholder="First Name">
            </p>
            
            <p>Last Name: <br>
            <input type="text" name="lastName" placeholder="Last Name"> 
            </p>
            
            <p>Birthday: <br>
            <input type="date" name="birthday">
            </p>
            
            <p>E-mail Address: <br>
            <input type="email" name="email" placeholder="E-mail Address">
            </p>
            
            <p>Mobile Number: <br> 
            <input type="text" name="mobileNumber" placeholder="Mobile Number">
            </p>
            
            <p>Username: <br>
            <input type="text" name="username" placeholder="Username">
            </p>
            
            <p>Password: <br>
            <input type="password" name="password" placeholder="Password">
            </p>
            
            <p>Re-enter Password: <br>
            <input type="password" name="verifyPassord" placeholder="Re-enter Password">
            </p>
            
            <p>Address Type: <br>
            <select name="addressType">
                <option>--Address Type--</option>
                <option value="home">Home</option>
                <option value="business">Business</option>
                <option value="postal">Postal</option>
            </select>
            </p>
            
            <p>Street: <br>
            <input type="text" name="street" placeholder="Street">
            </p>
            
            <p>Municipality: <br>
            <input type="text" name="municipality" placeholder="Municipality">
            </p>
            
            <p>Province: <br>
            <input type="text" name="province" placeholder="Province">
            </p>
            
            <p>Postal Code: <br>
            <input type="text" name="postalCode" placeholder="Postal Code"> <br>
            </p>
            
            <input type="submit" class="button" value="Register"> <a href="../index.php"><input type="button" class="button" value="return"></a>
        </form>

    </body>
</html>