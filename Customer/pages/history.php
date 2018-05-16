<?php
        
        require "../php/session.php";
?>

    <!DOCTYPE HTML>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../styles/style.css">
        <link rel="stylesheet" href="../styles/bootstrap-4.0.0/dist/css/bootstrap.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <title>Qrent</title>
    </head>

    <body id="body">
        <div class="container">
            <div class="row hidden-xs topper">
                <div class="cols-xs-7 col-sm-7">
                    <a href="home.php"><img  src="../images/qrent-logo.png" class="img-responsive" id="nav-logo" class="img-responsive"></a>
                </div>
            </div>
            <div class="nav-container">
                <?php include 'nav.html';?>
                
            </div>
            
             <table class="table table-borderless">
        <tr>
            <th>Item No</th>
            <th>Status</th>
            <th>Request Date</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Duration</th>
        </tr>
        
        <?php
            require "../php/connectToDb.php";
            
            echo "<center><h1>My Reservations</h1></center>";
            $sql = "SELECT * FROM Reservation WHERE client='$checkUser';";
            $results = mysqli_query($conn, $sql);
            if($results-> num_rows > 0){
                
                while($row = mysqli_fetch_array($results)){
                    echo "<tr><td scope='row'>". $row["itemno"] . "</td><td>". $row["status"] . "</td><td>" . $row["requestdate"] . "</td><td>" . $row["startdate"] . "</td><td>" .$row["enddate"]. "</td> <td>" .$row["duration"]. "</td>";
                }
            }
            else{
                echo "You have no reservations";
            }
                 
//            echo "<center><h1>My Transactions</h1></center>";
//            $sql = "SELECT * FROM Reservation WHERE client='$checkUser';";
//            $results = mysqli_query($conn, $sql);
//            if($results-> num_rows > 0){
//                
//                while($row = mysqli_fetch_array($results)){
//                    echo "<tr><td scope='row'>". $row["itemno"] . "</td><td>". $row["status"] . "</td><td>" . $row["requestdate"] . "</td><td>" . $row["startdate"] . "</td><td>" .$row["enddate"]. "</td> <td>" .$row["duration"]. "</td>";
//                }
//            }    
        ?>
    </table>
        </div>
        </body>
</html>