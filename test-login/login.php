<!DOCTYPE html>
<html>
    <head>
        <title> Sample Login</title>
    </head>
    <body>
        <h1> LOGIN FORM </h1>
        <form id="login-form" method="post" action="authenticate-login.php">
            <p> Username</p>
            <input type="text" name="user-id" id="user-id">
            <p> Password</p>
            <input type="text" name="password" id="password"> <br>
            <input type="Submit" value="Submit"> <br>
            <input type="reset" value="Reset Fields">
        </form>
    </body>
</html>