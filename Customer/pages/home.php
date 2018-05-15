<?php
        
        require "../php/connectToDb.php";
?>

    <!DOCTYPE HTML>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../styles/bootstrap-4.0.0/dist/css/bootstrap.css">
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
                <?php 
            require "../../connectToDb.php";
            $query = "SELECT itemno, itemName, itemDescription, itemBrand, itemRentPrice, itemOrigPrice, itemCondition  FROM Item ORDER BY 1";
            
            $result = mysqli_query($conn, $query);
            
            
            $count = mysqli_num_rows($result);
        
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
            
            
//                echo "<table class='content-container'>";
//                echo "<tr>
//                        <th>Item name</th>
//                        <th>Item Description</th>
//                        <th>Brand</th>
//                        <th>Price</th>
//                        <th>Original Price</th>
//                        <th>Condition</th>
//                    </tr>";
        
                while($row = mysqli_fetch_array($result)){
                $itemno = $row['itemno'];
                $name = $row['itemName'];
                $desc = $row['itemDescription'];
                $brand = $row['itemBrand'];
                $price = $row['itemRentPrice'];
                $ogprice = $row['itemOrigPrice'];
                $condition = $row['itemCondition'];
                    
                $imgquery = "SELECT itemimageid FROM qrent.ItemImage where itemno='$itemno'";
                $imageq = mysqli_query($conn, $imgquery);
//                echo "<br/>";    
//                echo "<tr>
//                        <td>$name</td>
//                      </tr>
//                      <tr>
//                        <td>$desc</td>
//                      </tr>
//                      <tr>
//                        <td>$brand</td>
//                      </tr>
//                      <tr>
//                        <td>$price</td>
//                      </tr>
//                      <tr>
//                        <td>$ogprice</td>
//                      </tr>
//                      <tr>
//                        <td>$condition</td>
//                    </tr>
//                    
//                </table>
                    echo '<div class="row">';
                      echo '<div class="col-sm-6 col-md-4">';
                        echo '<div class="thumbnail">';
                            while($r=mysqli_fetch_assoc($imageq)){
                                $imageLink = '/itemimage.php?img='.$r["itemimageid"];
                                echo '<img src = '.$imageLink.'>';
                            } 
                    echo'</div>';
                          echo'<div class="caption">';
                            echo"<h3>$name</h3><br/>";
                            echo"<p>$desc <br/> <b>$price</b> <br/> $ogprice <br/> $condition</p>";
                            echo'<p><a href=# class="btn btn-primary" role="button">Button</a> <a href=# class="btn btn-default" role="button">Button</a></p>';
                          echo "</div>
                        </div>
                      </div>
                    </div>";
                }
            ?>

                <!--
            <div class="row">
              <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                  <img src="..." alt="...">
                  <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p>...</p>
                    <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                  </div>
                </div>
              </div>
            </div>
        </div>
-->
            </div>
    </body>

    </html>