<?php
    require "session.php";

    $_POST['itemno'];
    //$checkUser
    
    mysqli_query("UPDATE Item set retStatus='loaned' WHERE itemno=$itemno");
    mysqli_query("UPDATE Reservation set client='$checkUser' WHERE itemno=$itemno");

    $sql = "INSERT INTO Reservation (itemno, client) VALUES ('$itemno', '$client')";
    //itemno user

    if ($conn->query($sql) === TRUE) {
    // echo "Item Reserved";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>