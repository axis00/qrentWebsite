<?php
<<<<<<< HEAD
    require "session.php";

    $itemno= $_GET['itemno'];
    //$checkUser

    mysqli_query($conn,"UPDATE Item set retStatus='loaned' WHERE itemno=$itemno");
    //mysqli_query($conn,"UPDATE Reservation set client='$checkUser' WHERE itemno=$itemno");

?>

<!DOCTYPE HTML>
<html>
    <head> <title> Reservation </title>
    </head>
    <body>
        <?php
            
            $itemno= $_GET['itemno'];

            mysqli_query($conn,"UPDATE Item set retStatus='loaned' WHERE itemno=$itemno");

             $sql = "INSERT INTO Reservation (itemno, status, requestdate, startdate, enddate, duration, client) VALUES ('$itemno', 'pending',NOW(), NOW(), NOW() + INTERVAL 1 DAY , '2', '$checkUser')";
        
            echo "$sql"
            
        ?>
    </body>
</html>
=======

  session_start();

  $_SESSION['user'];

  if(isset($_POST['resId']) && isset($_POST['startdate']) && isset($_POST['duration']) && isset($_SESSION['user'])){

    require "../php/connectToDb.php";

    $client = $_SESSION['user'];

    $itemno = $_POST['resId'];

    $duration = $_POST['duration'];
    $startdate = $_POST['startdate'];

    $sql = "INSERT INTO Reservation (itemno, status, requestdate,startdate, enddate, duration, client) VALUES ($itemno, 'pending',NOW(), startdate ,DATE_ADD(DATE('$startdate'), INTERVAL $duration DAY), $duration, '$client')";

    if ($conn->query($sql)) {
        header('Location: /');
        echo '<script>alert("Successfully made Reservation")</script>';
        die();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

  }

?>

>>>>>>> fd01c4ac9ae38d83ddf1228a02f2b168fe4f59e7

