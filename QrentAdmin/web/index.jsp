<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Admin Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    </head>
    <body style="background-color:#f7ebec;">
        <div class="container" id="admin-login">
            <div class="page-header">
                <h1>Admin Login</h1>    
            </div>
            
            <form method="post" action="login.jsp">
                <p>Username:</p>    
                <input type="text" name="username" id="username"/>
                <p>Password:</p>
                <input type="password" name="password" id="password"/>
                <br><br><input class="btn btn-primary" type="submit" value="Login" id="loginButton"/>
            </form>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>