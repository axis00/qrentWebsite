<?php

	session_start();

	$_SESSION['user'];

	if(isset($_POST['resId']) && isset($_POST['startdate']) && isset($_POST['duration']) && isset($_SESSION['user'])){

		require "../php/connectToDb.php";

		$client = $_SESSION['user'];

		$itemno = $_POST['resId'];

		$duration = $_POST['duration'];
		$startdate = $_POST['startdate'];

		echo $startdate;

		$sql = "INSERT INTO Reservation (itemno, status, requestdate, enddate, duration, client) VALUES ($itemno, 'pending',CURDATE(), DATE_ADD(CURDATE(), INTERVAL $duration DAY), '2', '$client')";

		/*if ($conn->query($sql)) {
           
       	} else {
       		echo "Error: " . $sql . "<br>" . $conn->error;
       	}*/

	}

?>