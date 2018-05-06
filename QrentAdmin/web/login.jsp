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

                PreparedStatement ps = con.prepareStatement("SELECT username, password , status FROM users WHERE ((type='Admin') AND (username = ? AND password = ?))");
                ps.setString(1, username);
                ps.setString(2, password);

                ResultSet res = ps.executeQuery();
                if (res.next()) {
                    String status = res.getString("status");
                    if (status.equals("approved")) {
                        session.setAttribute("user", username);
                        session.setMaxInactiveInterval(3600);
                        response.sendRedirect("homepage.jsp");
                    } else {
                        out.println("<p>User's registration is still pending</p>");
                    }
                } else {
                    out.println("<p>User doesn't exist.</p>");
                }
            } catch (SQLException ex) {
                out.println(ex);
            }
        %>
    </body>
</html>
