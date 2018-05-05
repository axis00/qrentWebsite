<%-- 
    Document   : RegisterAdmin
    Created on : May 5, 2018, 12:29:23 PM
    Author     : Rammaria Advincula
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Register New Admin User</title>
    </head>
    <body>
        <form method="post" action="register.jsp">
            <p>First Name:<input type="text" name="firstname" placeholder="First Name"></p>
            <p>Last Name:<input type="text" name="lastname" placeholder="Last Name"></p>
            <p>E-mail Address:<input type="text" name="email" placeholder="E-mail Address"></p>
            <p>Username:<input type="text" name="username" placeholder="Enter a unique username"></p>
            <p>Password:<input type="text" name="password" placeholder="Password"></p>
            <p>Re-type Password:<input type="text" name="repassword" placeholder="Re-type password"></p>
            <p>Submit<input type="submit" value="Submit"></p>
        </form>
    </body>
</html>
