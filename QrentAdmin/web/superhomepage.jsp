<%@page import="java.time.format.DateTimeFormatter"%>
<%@page import="java.time.LocalDateTime"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body style="background-color:#f7ebec">
        <div class='container'>
        <%
            if(session.isNew())
                response.sendRedirect("index.html");
            DateTimeFormatter formatter = DateTimeFormatter.ofPattern("yyyy-MM-dd HH:mm:ss");
        %>
        
            <p>Current time = <%out.println(LocalDateTime.now().format(formatter));%></p>
            <p>Your session id = <% out.println(session.getId());%></p>
            <div class="page-header">
                <h1>Super home page</h1>
            </div>
            <a href="register-page.jsp">Register new admins</a>
            <a href="manage-users.jsp">Remove admin</a>
            <br><a href="logout.jsp">Logout</a>
        </div>
    </body>
</html>
