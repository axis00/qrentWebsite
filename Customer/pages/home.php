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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous""></script>
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
    </div>
    
    <div>
        <table class="table table-borderless">
            <tr >
                <th >Item No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Brand</th>
                <th>Owner</th>
                <th>Rentprice</th>
                <th>Condition</th>
                <th>Reserve</th>
            </tr>
            
            <?php
                require "../php/connectToDb.php";
                
                $sql = "SELECT Item.itemno,itemName,itemDescription,itemBrand,itemOwner,itemRentPrice,
                    itemOrigPrice,itemCondition,retStatus from Item left join Reservation 
                    on(Item.itemno = Reservation.itemno) where ReservationID is null and retStatus = 'returned'";

                $results = mysqli_query($conn, $sql);
                if($results-> num_rows > 0){
                    $x = 1;
                    while($row = mysqli_fetch_array($results)){

                        echo "<tr>
                            <td scope='row'>". $row["itemno"] . "</td>
                            <td>". $row["itemName"] . "</td>
                            <td>" . $row["itemDescription"] . "</td>
                            <td>" . $row["itemBrand"] . "</td><td>" .$row["itemOwner"]. "</td> 
                            <td>" .$row["itemRentPrice"]. "</td>
                            <td>" .$row["itemCondition"]. "</td>
                            <td> <button class='reserveBtn btn' data-resId=".$row['itemno'].">Reserve</button>
                        </tr>";

                    }
                }
                     
            ?>
        </table>
    </div>
    <div id = "reserveFormCont" style="display: none">
        <div class = "card form-group">
            <h2 class = "card-title">Reservation Form</h2>
            <form action="../php/reserve.php" method="POST">
                <input id = "resid" name = "resId" type = "hidden">
                <label for="startdate">Start Date</label>
                <input class="form-control" type='date' name = 'startdate' id = 'startdate' required="required">
                <label for="duration">Rental Duration</label>
                <input class="form-control" type='number' name = 'duration' id = "duration" required="required">
                <input type="submit" value="Reserve" class="btn btn-primary">
                <input type="reset" value="cancel" class="btn btn-danger" id = "cancelResBtn">
            </form>
        </div>
    </div>
    <script src="../scripts/reserve.js"></script>
</body>

</html>
