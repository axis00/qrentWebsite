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
        $street = "";
        $municipality = "";
        $province = "";
        $postalCode = "";

        if( isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['birthday']) && isset($_POST['email']) && isset($_POST['mobileNumber']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['street']) && isset($_POST['municipality']) && isset($_POST['province']) && isset($_POST['postalCode'])){
            $first = $_POST['firstName'];
            $last = $_POST['lastName'];
            $birthday = $_POST['birthday'];
            $email = $_POST['email'];
            $mobile = $_POST['mobileNumber'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password = sha1($password);
            $street = $_POST['street'];
            $municipality = $_POST['municipality'];
            $province = $_POST['province'];
            $postalCode = $_POST['postalCode'];
            $type = "Client";
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
        <title>Qrent</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    
    <body>
        <div class="navbar">
            <p>REGISTRATION FORM</p>
        </div>
        
        <div class="content-reg">
            <form action="register.php" method="post">
                          
                <input type="text" name="firstName" placeholder="First Name"><br>
            
                <input type="text" name="lastName" placeholder="Last Name"><br>
                
                <input type="email" name="email" placeholder="E-mail Address"><br>
            
                <input type="text" name="mobileNumber" placeholder="Mobile Number"><br>
            
                <input type="text" name="username" placeholder="Username"><br>
            
                <input type="password" name="password" placeholder="Password"><br>
            
                <input type="password" name="verifyPassord" placeholder="Re-enter Password"><br>
            
                <p>Birthday: <br>
                <input type="date" name="birthday"><br>
                </p>
                
                <p>Address <br>
                    <input type="text" name="street" placeholder="Street"><br>
                
                <input type="text" name="municipality" placeholder="Municipality"> <br>
            
                <input type="text" name="province" placeholder="Province"> <br>
                            
                <input type="text" name="postalCode" placeholder="Postal Code"> <br>
                </p>
                
                <div id="button-reg">
                <input type="submit" class="button-reg" value="Register"> <a href="../index.php"><input type="button" class="button-reg" value="return"></a>
                </div>
            </form>
        </div>

    </body>
</html>