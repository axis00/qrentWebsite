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

    <body>
        <div class="container">
            <h1 class="display-4 text-left">Homepage</h1>
            <div class="nav-container">
                <?php include 'nav.html';?>
            </div>
            <table class="table table-striped">

                <tr>
                    <th>Item</th>
                    <th>Description</th>
                    <th>Brand</th>
                    <th>Owner</th>
                    <th>Rentprice</th>
                    <th>Condition</th>
                    <th>Reserve</th>
                </tr>

                <?php
                require "../php/connectToDb.php";
                
                $sql = "SELECT * FROM Item";
                $results = mysqli_query($conn, $sql);
                if($results-> num_rows > 0){
                    $x = 1;
                    while($row = mysqli_fetch_array($results)){

                        echo "<tr>
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

        <div>

        </div>
    </body>

    </html>
