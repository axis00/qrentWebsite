<?php
    require "session.php";

    $itemno= $_GET['itemno'];
    //$checkUser

    mysqli_query($conn,"UPDATE Item set retStatus='loaned' WHERE itemno=$itemno");
    mysqli_query($conn,"UPDATE Reservation set client='$checkUser' WHERE itemno=$itemno");

    // $sql = "INSERT INTO Reservation (ReservationID, itemno, status, requestdate, enddate, duration, client) VALUES ('$itemno', '$client')";
    //itemno user
//
//    if ($conn->query($sql) === TRUE) {
//    // echo "Item Reserved";
//    } else {
//    echo "Error: " . $sql . "<br>" . $conn->error;
//    }
?>

<!DOCTYPE HTML>
<html>
    <head> <title> Reservation </title>
    </head>
    <body>
        <?php
            $itemno= $_GET['itemno'];

            mysqli_query($conn,"UPDATE Item set retStatus='loaned' WHERE itemno=$itemno");
            mysqli_query($conn,"UPDATE Reservation set client='$checkUser' WHERE itemno=$itemno");

             // $sql = "INSERT INTO Reservation (ReservationID, itemno, status, requestdate, enddate, duration, client) VALUES (UUID()'$itemno', 'pending',CURDATE(), DATE_ADD(CURDATE(), INTERVAL 2 DAY), '2', $client')";
        
            echo "$sql"
            //itemno user

//            if ($conn->query($sql) === TRUE) {
//            // echo "Item Reserved";
//            } else {
//            echo "Error: " . $sql . "<br>" . $conn->error;
//            }
        ?>
    </body>
</html>

