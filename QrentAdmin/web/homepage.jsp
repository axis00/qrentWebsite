<%@page import="java.util.TimeZone"%>
<%@page import="java.util.Calendar"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Home page</title>
    </head>
    <body>
        <%
            if(session.isNew()) {
                response.sendRedirect("index.html");
            }          
        %>
        <p>Your session id = <% out.println(session.getId());%></p>
        <p>Welcome <b><% out.println(session.getAttribute("user"));%></b></p>
        <h1>Admin Homepage</h1>
        <a href="logout.jsp">Logout</a>
    </body>
</html>
