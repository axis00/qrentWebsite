<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Home page</title>
    </head>
    <body>
        <p>Your session id = <% out.println(session.getId());%></p>
        <h1>Admin Homepage</h1>
        
        <a href="logout.jsp">Logout</a>
    </body>
</html>
