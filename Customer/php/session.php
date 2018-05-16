<?php
    session_start();
    require "connectToDb.php";
    $checkUser = $_SESSION['user'];
    $sessionSql = mysqli_query($conn, "SELECT CONCAT(lastname, ' ', firstname) AS name FROM users where username = '$checkUser';");
    $row = mysqli_fetch_array($sessionSql, MYSQLI_ASSOC);
    $current_session = $row['name'];

     if(!isset($_SESSION['user'])){
        header("location:http://laboratory/");     
   }
?>