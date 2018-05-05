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
        <title>JSP Page</title>
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

                PreparedStatement ps = con.prepareStatement("SELECT username, password FROM users WHERE ((type='Admin') AND (username = ? AND password = ?))");
                ps.setString(1, username);
                ps.setString(2, password);

                ResultSet res = ps.executeQuery();
                if (res.next()) {
                    session.setAttribute("user", username);
                    session.setMaxInactiveInterval(3600);
                } else {
                    out.println("Failed");
                }
            } catch (SQLException ex) {
                ex.printStackTrace();
            }
        %>
    </body>
</html>
