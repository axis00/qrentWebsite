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
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Pending Clients</title>
        
    </head>
    <body>
        <div class="container">
        <div class="page-header">
            <h1>Approve Service Providers</h1>
        </div>
            
        <div class="container" id="navbar-container">
            <nav class="navbar navbar-default">
                <ul class="nav navbar-nav">
                    <li><a href="pendingclients.jsp">Pending Clients</a></li>
                    <li><a href="pending-sp.jsp">Pending Service Providers</a></li>
                    <li><a href="manage-users.jsp">Manage users</a></li>
                    <li><a href="user-transaction.jsp">Transaction History</a></li>
                    <li><a href="logout.jsp">Logout</a></li>
                </ul>
            </nav>    
        </div>
        
        <ul class="nav nav-tabs">
                <li role="presentation"><a href="approve-accounts.jsp">All Users</a></li>
                <li role="presentation"><a href="pendingclients.jsp">Clients</a></li>
                <li role="presentation" class="active"><a href="pending-sp.jsp">Service Providers</a></li>
        </ul>
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
                <th></th>
            </tr>
            <%
                Connection con;
                try {
                    Class.forName("com.mysql.jdbc.Driver");
                    con = DriverManager.getConnection("jdbc:mysql://qrentdb.cqmw41ox1som.ap-southeast-1.rds.amazonaws.com/qrent", "root", "letmein12#");

                    response.setContentType("text/html");

                    PreparedStatement ps = con.prepareStatement("SELECT username, firstname, lastname, email, type, status FROM users WHERE type = 'Service Provider' AND status = 'pending'");

                    ResultSet res = ps.executeQuery();

                    while (res.next()) {
                        out.println("<tr>");
                        out.println("<td>" + res.getString("username") + "<td>");
                        out.println("<td>" + res.getString("firstname") + "<td>");
                        out.println("<td>" + res.getString("lastname") + "<td>");
                        out.println("<td>" + res.getString("email") + "<td>");
                        out.println("<td>" + res.getString("type") + "<td>");
                        out.println("<td>" + res.getString("status") + "<td>");
                        out.println("<td><form action = 'approve-sp.jsp' method = 'POST'><input type = 'hidden' name = 'username' value = "
                                + res.getString("username") + "><input type = 'submit' value = 'Approve' class='btn btn-success'></form></td>");
                        out.println("<td><form action = 'reject-sp.jsp' method = 'POST'><input type = 'hidden' name = 'username' value = "
                                + res.getString("username") + "><input type = 'submit' value = 'Reject' class='btn btn-danger'></form></td>");
                        out.println("</tr>");
                    }
                } catch (SQLException ex) {
                    out.println(ex);
                }
            %>
        </table>
        <a href = "homepage.jsp" class="btn btn-primary btn-lg">Home</a>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>