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
            DateTimeFormatter formatter = DateTimeFormatter.ofPattern("yyyy-MM-dd HH:mm:ss");
        %>
        
            <div class="page-header">
                <h1>Admin Homepage</h1>
            </div>
            
            gi
            <p><big>Welcome <b><%out.println(session.getAttribute("user"));%></b>!</big></p>
            <p>Current time: <%out.println(LocalDateTime.now().format(formatter));%></p>
            <p>Your session id: <% out.println(session.getId());%></p>
            
        </div>
            
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>
