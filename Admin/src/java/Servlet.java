
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.*;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.logging.Logger;
import javax.servlet.ServletConfig;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author
 */
public class Servlet extends HttpServlet {
    
    private final String DBIP = "qrentdb.cqmw41ox1som.ap-southeast-1.rds.amazonaws.com/";
    private final String DBURL = "jdbc:mysql://" + DBIP + ":3306/qrent";
    private final String USER = "root";
    private final String PASSWORD = "letmein12#";
    
    private Connection con;
    private PreparedStatement ps;
    
    public void init(ServletConfig config) throws ServletException{
        super.init(config);
        System.out.print("init");
        try {
            connectToDb();
        } catch (Exception e) {
                e.printStackTrace();
        }
    }

    public void connectToDb() throws SQLException{
        try {
            Class.forName("com.mysql.jdbc.Driver");
            con = DriverManager.getConnection(DBURL,USER,PASSWORD);
            
        } catch (Exception e){
            e.printStackTrace();
        } 
        

    }
    
    public void disconnectFromDb() throws SQLException {
        con.close();
    }
    
    /**    }
    

     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet Servlet</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println("<h1>Servlet Servlet at " + request.getContextPath() + "</h1>");
            out.println("</body>");
            out.println("</html>");
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
        
        
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        System.out.print("post");
//        response.setContentType("text/html");
//        String message;
//        PrintWriter out = response.getWriter();
//        try {
//            String username = request.getParameter("username");
//            String password = request.getParameter("password");
//            
//            ps = con.prepareStatement("SELECT username, password FROM users WHERE ((type='Admin') AND (username=? AND password=?))");
//            ps.setString(1, username);
//            ps.setString(2, password);
//            
//            ResultSet res = ps.executeQuery();
//            if (res.next()){
//                out.println("Sucess");
//            } else {
//                out.println("Failed");
//            }
//        } catch (Exception e){
//            e.printStackTrace();
//        }
        //processRequest(request, response);
        System.out.println("fml");
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
