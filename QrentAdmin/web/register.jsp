<%-- 
    Document   : RegisterAdmin
    Created on : May 5, 2018, 12:29:23 PM
    Author     : Rammaria Advincula
--%>
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
        <title>Register New Admin User</title>
    </head>
    <body>
        <%
            Connection con;
            try {
                Class.forName("com.mysql.jdbc.Driver");
                con = DriverManager.getConnection("jdbc:mysql://qrentdb.cqmw41ox1som.ap-southeast-1.rds.amazonaws.com/qrent", "root", "letmein12#");
         
                response.setContentType("text/html");

                String username = request.getParameter("username");
                String password = request.getParameter("password");

                PreparedStatement ps = con.prepareStatement("INSERT into users(username, password) VALUES (?,?)");
                ps.setString(1, username);
                ps.setString(2, password);
                
                out.println(username);
                out.println(password);
                
            } catch (SQLException ex) {
                ex.printStackTrace();
            }
        %>
    </body>
</html>
