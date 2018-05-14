
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        
        <title>Register New Admin User</title>
    </head>
    <body style="background-color:#f7ebec">
        <%
            if (session.isNew()) {
                response.sendRedirect("index.html");
            }
        %>
        <p>Session id = <% out.println(session.getId());%></p>
        <div class='container'>
            <div class="page-header">
                <h1>Register</h1>
            </div>
            <form method="post" action="register.jsp">
                <p>Username:</p>
                <input type="text" name="username" id="username"/>
                <p>Password:</p>
                <input type="password" name="password" id="password"/>
                <p>First Name:</p>
                <input type="text" name="firstname" id="firstname"/>
                <p>Last Name:</p>
                <input type="text" name="lastname" id="lastname"/>
                <p>Email</p>
                <input type="text" name="email" id="email"/>
                <br><br><input class="btn btn-primary btn-lg" type="submit" value="Register" id="registerButton"/>
            </form>
            <a href="superhomepage.jsp" class="btn btn-primary" style="margin-top: 15px;">Home</a>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>
