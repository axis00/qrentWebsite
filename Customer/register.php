<!DOCTYPE HTML>
<html>
    
    <head>
        <title>Registration</title>
    </head>
    <body>
        <a href="index.php"><input type="button" value="return"></a>
        <form action="profile.php" method="post">
            <p>First Name</p>
            <input type="text" name="firstName" placeholder="First Name"><br>
            <p>Last Name</p>
            <input type="text" name="lastName" placeholder="Last Name"> <br>
            <p>Birthday</p>
            <input type="date" name="birthday">
            <p>E-mail Address</p>
            <input type="email" name="email" placeholder="E-mail Address"> <br>
            <p>Mobile Number</p>
            <input type="text" name="mobileNumber" placeholder="Mobile Number"> <br>
            <p>Username</p>
            <input type="text" name="username" placeholder="Username"> <br>
            <p>Password</p>
            <input type="password" name="password" placeholder="Password"><br>
            <p>Re-enter Password</p>
            <input type="password" name="verifyPassord" placeholder="Re-enter Password"><br>
            <p>Address Type</p>
            <select name="addressType">
                <option>--Address Type--</option>
                <option value="home">Home</option>
                <option value="business">Business</option>
                <option value="postal">Postal</option>
            </select>
            <p>Street</p>
            <input type="text" name="street" placeholder="Street"> <br>
            <p>Municipality</p>
            <input type="text" name="municipality" placeholder="Municipality"> <br>
            <p>Province</p>
            <input type="text" name="province" placeholder="Province"> <br>
            <p>Postal Code</p>
            <input type="text" name="postalCode" placeholder="Postal Code"> <br>
            <br>
            <input type="submit" value="Register">
        </form>

    </body>
</html>

        
        <?php
            require "../connectToDb.php";
            function validatePassword($pass1,$pass2){
                ifSame == strcmp($pass1,$pass2);
                if ($ifSame != 0){
                    echo "Password Does not Match!";
                }
            }
        ?>
