<%@page import="java.time.format.DateTimeFormatter"%>
<%@page import="java.time.LocalDateTime"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script><script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
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
                        <li><a href="approve-accounts.jsp">Approve User Accounts</a></li>
                        <li><a href="user-transaction.jsp">Transaction History</a></li>
                        <li><a href="logout.jsp">Logout</a></li>
                </ul>
            </nav>
                        <li><a href="logout.jsp">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>
