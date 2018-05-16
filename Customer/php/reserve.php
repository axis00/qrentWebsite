<?php

  session_start();

  $_SESSION['user'];

  if(isset($_POST['resId']) && isset($_SESSION['user'])){

    require "../php/connectToDb.php";

    $client = $_SESSION['user'];

    $itemno = $_POST['resId'];

    $sql = "INSERT INTO Reservation (itemno, status, requestdate, enddate, duration, client) VALUES ($itemno, 'pending',CURDATE(), DATE_ADD(CURDATE(), INTERVAL 2 DAY), '2', '$client')";

    if ($conn->query($sql)) {
           echo "Item Reserved";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }

  }

?>

