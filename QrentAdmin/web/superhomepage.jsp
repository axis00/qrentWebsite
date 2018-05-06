<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%
            if(session.isNew())
                response.sendRedirect("index.html");
        %>
        
        <p>Your session id = <% out.println(session.getId());%></p>
        <h1>Super home page</h1>
        <a href="register.html">Register new admins</a>
        <br><a href="logout.jsp">Logout</a>
    </body>
</html>
