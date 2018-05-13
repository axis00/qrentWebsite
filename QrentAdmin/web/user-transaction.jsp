<%-- 
    Document   : user-transactions
    Created on : 05 9, 18, 3:00:13 PM
    Author     : Advincula, Rammaria
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
        <title>Transaction History</title>
         <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        
        <style>
            #navbar-container {
                margin: 0;
                padding: 0;
            }
        </style>
    </head>
    <body style="background-color:#f7ebec">
        <h1>Transaction History</h1>
        
        <table class="table table-hover">
            <tr>
                <th>Transaction Date</th>
                <th>Transaction No.</th>
                <th>Username</th>
                <th>Rented Item</th>
                <th>Duration</th>
                <th>Price</th>
                <th>Mode of payment</th>
                <th></th>
            </tr>
            
            <%
                Connection con;
                try {
                        Class.forName("com.mysql.jdbc.Driver");
                        con = DriverManager.getConnection("jdbc:mysql://qrentdb.cqmw41ox1som.ap-southeast-1.rds.amazonaws.com/qrent", "root", "letmein12#");

                        response.setContentType("text/html");

                        PreparedStatement ps = con.prepareStatement("SELECT paymentdate, paymentid  FROM transaction NATURAL JOIN Reservation NATURAL JOIN customers ORDER BY paymentdate ASC");

                        ResultSet res = ps.executeQuery();
                        
                        if (!res.next()){
                            out.println("<tr><td> There are no transactions available </td></tr>");
                       
                        }else{
                            while (res.next()) {
                                out.println("<tr>");
                                out.println("<td>" + res.getString("paymentdate") + "</td>");
                                out.println("<td>" + res.getString("paymentid") + "</td>");
                                out.println("<td>" + res.getString("") + "</td>");
                                out.println("<td>" + res.getString("") + "</td>");
                                out.println("<td>" + res.getString("") + "</td>");
                                out.println("<td>" + res.getString("") + "</td>");
                                out.println("<td>" + res.getString("") + "</td>");
                                out.println("</tr>");
                            }
                        }
                    } catch (SQLException ex) {
                        out.println(ex);
                    }
            %>
        </table>
         <a href = "homepage.jsp" class="btn btn-primary btn-lg">Home</a>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>
