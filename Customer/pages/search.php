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

    <body style="background-color: #F7EBEC;">
        <div class="nav-container">
            <?php include 'nav.html';?>
        </div>
        <div class="container" style="margin-top:5%">
            <div class="d-inline">
                <img class="d-inline" src="../images/qrent-logo.png" width="100px" height="100px" />
                <h1 class="d-inline display-4 text-left">Homepage</h1>
            </div>
            <table class="table table-striped">
                <tr>
                    <th>Item No</th>
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

                $query = "%%";

                if(isset($_GET['q'])){
                    $query = '%' . $_GET['q'] . '%';
                }
                
                $sql = "SELECT Item.itemno,itemName,itemDescription,itemBrand,itemOwner,itemRentPrice,   
                        itemOrigPrice,itemCondition,retStatus from Item left join Reservation   
                        on(Item.itemno = Reservation.itemno) where ReservationID is null and retStatus = 'returned' 
                        and (itemName LIKE ? or itemDescription LIKE ? or itemBrand LIKE ? or itemOwner LIKE ?)";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param('ssss',$query,$query,$query,$query);
                $stmt->execute();


                $results = $stmt->get_result();
                if($results->num_rows > 0){
                    $x = 1;
                    while($row = mysqli_fetch_array($results)){
                        echo "<tr>
                            <td scope='row'>". $row["itemno"] . "</td>
                            <td>". $row["itemName"] . "</td>
                            <td>" . $row["itemDescription"] . "</td>
                            <td>" . $row["itemBrand"] . "</td><td>" .$row["itemOwner"]. "</td> 
                            <td>" .$row["itemRentPrice"]. "</td>
                            <td>" .$row["itemCondition"]. "</td>
                            <td>
                            <form action='../php/reserve.php' method='POST' class = 'reserveForm'>
                                <input type = 'hidden' name = 'resId' value = ".$row["itemno"].">
                                <input type='submit' class='btn btn-secondary' name='item' value='Reserve'>
                            </form>
                        </tr>";
                    }
                }
                     
            ?>
            </table>
        </div>
    </body>

    </html>
