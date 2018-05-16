<?php
        
        require "../../connectTodb.php";
?>

<!DOCTYPE HTML>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../styles/bootstrap-4.0.0/dist/css/bootstrap.css">
        <link rel="stylesheet" href="../styles/style.css">
        <title>Qrent</title>
    </head>
    
    <body>
        <div class="navigation-bar">
            <div class="nav-element">
                <a href="home.php"><img  src="../images/qrent-logo.png"></a>
            </div>
            <div id="user" class="nav-element">
                <a href="profile.php">
                </a>
                <div class="nav-element" id="logout">
                    <a href="../php/logout.php"><input class="search-button" type="button" value="Logout" id="logout-button"></a>
                </div>
            </div>
            <div id="search">
                <form action="/action_page.php">
                      <input type="text" placeholder="Search.." name="search">
                      <button type="submit">Submit</button>
                </form>
            </div>

        </div>
    <div class="#sidenav">
    </div>
    <div class="content">
        <?php 
            require "../../connectToDb.php";
            $query = "SELECT itemno, itemName, itemDescription, itemBrand, itemRentPrice, itemOrigPrice, itemCondition  FROM Item ORDER BY 1";
            
            $result = mysqli_query($conn, $query);
            
            
            $count = mysqli_num_rows($result);
        
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
            
        
                while($row = mysqli_fetch_array($result)){
                $itemno = $row['itemno'];
                $name = $row['itemName'];
                $desc = $row['itemDescription'];
                $brand = $row['itemBrand'];
                $price = $row['itemRentPrice'];
                $ogprice = $row['itemOrigPrice'];
                $condition = $row['itemCondition'];
                    
                $imgquery = "SELECT imagefile FROM qrent.ItemImage where itemno='$itemno' BY 1";
                $imageq = mysqli_query($conn, $imgquery);
                    while($r=mysqli_fetch_assoc($imageq))
                        {
                            $imagefile = $r["imagefile"];
                        } 

                    echo '<div class="row">';
                      echo '<div class="col-sm-6 col-md-4">';
                        echo '<div class="thumbnail">';
                          echo"<img src='$imagefile'>";
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

    </body>
</html>