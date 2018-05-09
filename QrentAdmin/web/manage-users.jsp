<%@page import="java.sql.DriverManager"%>
<%@page import="java.sql.Connection"%>
<%@page import="java.sql.SQLException"%>
<%@page import="java.sql.PreparedStatement"%>
<%@page import="java.sql.ResultSet"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        
        <title>Manage Users</title>
    </head>
    <body style="background-color:#f7ebec">
        <div class="container">
            <p>Session id = <%out.println(session.getId());%></p>
            <div class='page-header'>
                <h1>Manage Users</h1>
            </div>
            <table class="table table-hover">
            <tr>
                <th>Username</th>
                <th></th>
                <th>First Name</th>
                <th></th>
                <th>Last Name</th>
                <th></th>
                <th>Email</th>
                <th></th>
                <th>Type</th>
                <th></th>
                <th>Status</th>
                <th></th>
                <th></th>
            </tr>
            <%
                Connection con;
                try {
                    Class.forName("com.mysql.jdbc.Driver");
                    con = DriverManager.getConnection("jdbc:mysql://qrentdb.cqmw41ox1som.ap-southeast-1.rds.amazonaws.com/qrent", "root", "letmein12#");

                    response.setContentType("text/html");

                    PreparedStatement ps = con.prepareStatement("SELECT username, firstname, lastname, email, type, status FROM users WHERE type != 'Super Admin'");

                    ResultSet res = ps.executeQuery();

                    while (res.next()) {

                        out.println("<tr>");
                        out.println("<td>" + res.getString("username") + "<td>");
                        out.println("<td>" + res.getString("firstname") + "<td>");
                        out.println("<td>" + res.getString("lastname") + "<td>");
                        out.println("<td>" + res.getString("email") + "<td>");
                        out.println("<td>" + res.getString("type") + "<td>");
                        out.println("<td>" + res.getString("status") + "<td>");
                        out.println("<td><form action = 'remove-user.jsp' method = 'POST'><input type = 'hidden' name = 'username' value = "
                                + res.getString("username") + "><input type = 'submit' value = 'Remove user' class='btn btn-warning'></form></td>");
                        out.println("</tr>");
                    }
                } catch (SQLException ex) {
                    out.println(ex);
                }
            %>
        </table>
        <a href = "homepage.jsp" class="btn btn-primary btn-lg">Home</a>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        </div>
    </body>
</html>
