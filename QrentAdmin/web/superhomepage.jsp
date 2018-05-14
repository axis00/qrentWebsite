<%@page import="java.time.format.DateTimeFormatter"%>
<%@page import="java.time.LocalDateTime"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <style>
            #navbar-container {
                margin: 0;
                padding: 0;
            }
        </style>
        
        <title>Super Admin Homepage</title>
    </head>
    <body style="background-color:#f7ebec">
        <div class='container'>
        <%
            if(session.isNew())
                response.sendRedirect("index.html");
        %>
            <div class="page-header">
                <h1>Super Admin Home Page</h1>
            </div>
            
            <div class="container" id="navbar-container">
                <nav class="navbar navbar-default" style="background-color: ">
                    <ul class="nav navbar-nav">
                        <li><a href="register-page.jsp">Register New Admin</a></li>
                        <li><a href="manage-users.jsp">Manage Users</a></li>
                        <li><a href="logout.jsp">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>
