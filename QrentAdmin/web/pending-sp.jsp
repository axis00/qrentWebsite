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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Approve Pending Users</title>

    </head>
    <body id="body">
        <%
            if (session.getAttribute("username") == null) {
                response.sendRedirect("index.jsp");
            }
        %>
        <div class="container">
            <div class="row hidden-xs topper" id="top-nav-container">
                <div class="cols-xs-7 col-sm-7">
                    <img src="qrent-logo.png" id="nav-logo" class="img-responsive"/>
                </div>
                <div class="cols-xs-5 col-xs-offset-1 col-sm-offset-0 text-left" id="page-header">
                    <h1>Approve Pending Users</h1>
                </div>
            </div>
            <% if (session.getAttribute("username").equals("super")) {%>
            <%@include file="supernav.html"%>
            <%} else {%>
            <%@include file="nav.html"%>
            <%}%>

            <nav class="navbar bg-faded">
                <div class="navbar-collapse justify-content-md-center">
                    <ul class="navbar nav">
                        <li class="nav-item">View by:</li>
                        <li class="nav-item"><a href="approve-accounts.jsp" class="nav-link2">All Users</a></li>
                        <li class="nav-item"><a href="pendingclients.jsp" class="nav-link2" >Clients</a></li>
                        <li class="nav-item"><a href="pending-sp.jsp" class="nav-link2" id="active-item">Service Providers</a></li>
                    </ul>
                </div>
            </nav>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Username</th>
                        <th></th>
                        <th scope="col">First Name</th>
                        <th></th>
                        <th scope="col">Last Name</th>
                        <th></th>
                        <th scope="col">Email</th>
                        <th></th>
                        <th scope="col">Type</th>
                        <th></th>
                        <th scope="col">Status</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <%
                    Connection con;
                    try {
                        Class.forName("com.mysql.jdbc.Driver");
                        con = DriverManager.getConnection("jdbc:mysql://qrentdb.cqmw41ox1som.ap-southeast-1.rds.amazonaws.com/qrent", "root", "letmein12#");

                        response.setContentType("text/html");

                        PreparedStatement ps = con.prepareStatement("SELECT username, firstname, lastname, email, type, status FROM users WHERE type = 'Service Provider' AND status = 'pending'");

                        ResultSet res = ps.executeQuery();

                        while (res.next()) {
                            out.println("<tr scope='row' class='row-hover'>");
                            out.println("<td>" + res.getString("username") + "<td>");
                            out.println("<td>" + res.getString("firstname") + "<td>");
                            out.println("<td>" + res.getString("lastname") + "<td>");
                            out.println("<td>" + res.getString("email") + "<td>");
                            out.println("<td>" + res.getString("type") + "<td>");
                            out.println("<td>" + res.getString("status").toUpperCase() + "<td>");
                            out.println("<td><form action = 'approve-sp.jsp' method = 'POST'><input type = 'hidden' name = 'username' value = "
                                    + res.getString("username") + "><input type = 'submit' value = 'Approve' class='btn btn-success' id='btn-approve'></form></td>");
                            out.println("<td><form action = 'reject-sp.jsp' method = 'POST'><input type = 'hidden' name = 'username' value = "
                                    + res.getString("username") + "><input type = 'submit' value = 'Reject' class='btn btn-danger' id='btn-reject'></form></td>");
                            out.println("</tr>");
                        }
                    } catch (SQLException ex) {
                        out.println(ex);
                    }
                %>
            </table>

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script><script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    </body>
</html>
