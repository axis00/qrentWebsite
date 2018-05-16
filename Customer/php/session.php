<?php
    require "connectToDb.php";
    session_start();

    $checkUser = $_SESSION['user'];
    $sessionSql = mysqli_query($conn, "SELECT CONCAT(firstname, ', ', lastname) AS name FROM users where username = '$checkUser';");
    $row = mysqli_fetch_array($sessionSql, MYSQLI_ASSOC);
    $current_session = $row['name'];

     if(!isset($_SESSION['user'])){
        echo "Hi";
   }
?>