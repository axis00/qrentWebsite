<%@page import="java.time.format.DateTimeFormatter"%>
<%@page import="java.time.LocalDateTime"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">        
        <title>Home page</title>
    </head>
    <body>
        <div class="container">
        <%
            if(session.isNew()) {
                response.sendRedirect("index.html");
            }
        %>
        
            <div class="page-header">
                <h1>Admin Homepage</h1>
            </div>
        
            <p><big>Welcome <b><%out.println(session.getAttribute("user"));%></b>!</big></p>
        
            <div class="container" id="navbar-container">
                <div class="container" id="navbar-container">
                    <nav class="navbar navbar-default" style="background-color: ">
                        <ul class="nav navbar-nav">
                            <li><a href="approve-accounts.jsp">Approve User Accounts</a></li>
                            <li><a href="manage-users.jsp">Manage Users</a></li>
                            <li><a href="user-transaction.jsp">Transaction History</a></li>
                            <li><a href="logout.jsp">Logout</a></li>
                        </ul>
                    </nav>
                </div>
            </div>     
        </div>
            
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>
