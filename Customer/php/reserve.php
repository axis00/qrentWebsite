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

>>>>>>> fd01c4ac9ae38d83ddf1228a02f2b168fe4f59e7

