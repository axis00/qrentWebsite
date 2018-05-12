<script>
	function loginReq(){
		alert("Login is Required");
		window.location.href = "http://laboratory/";
	}
</script>
<?php
    require "../../connectToDb.php";
    session_start();

    $checkUser =$_SESSION['username'];
    $sessionSql = mysqli_query($conn, "SELECT CONCAT(lastname, ' ', firstname) AS name FROM users where username = '$checkUser';");
    $row = mysqli_fetch_array($sessionSql, MYSQLI_ASSOC);
    $current_session = $row['name'];

     if(!isset($_SESSION['user'])){
      echo "<script>loginReq()</script>";
      header("location:http://laboratory/");
      
   }