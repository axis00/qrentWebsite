<%@page import="java.time.format.DateTimeFormatter"%>
<%@page import="java.time.LocalDateTime"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Home page</title>
    </head>
    <body style="background-color:#f7ebec">
        <div class='container'>
        <%
            if(session.isNew()) {
                response.sendRedirect("index.html");
            }
            DateTimeFormatter formatter = DateTimeFormatter.ofPattern("yyyy-MM-dd HH:mm:ss");
        %>
        
            <p>Current time = <%out.println(LocalDateTime.now().format(formatter));%></p>
            <p>Your session id = <% out.println(session.getId());%></p>
            <p>Welcome <b><% out.println(session.getAttribute("user"));%></b>!</p>
            <div class='page-header'>
                <h1>Admin Homepage</h1>
            </div>
            <a href="pendingclients.jsp">Pending Clients</a>
            <a href="pending-sp.jsp">Pending Service Providers</a>
            <a href="manage-users.jsp">Manage users</a>
            <a href="logout.jsp">Logout</a>
        </div>
    </body>
</html>
