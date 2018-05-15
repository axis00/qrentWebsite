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
            $query = "SELECT itemName, itemDescription, itemBrand, itemRentPrice, itemOrigPrice, itemCondition  FROM Item ORDER BY 1";
        
            $result = mysqli_query($conn, $query);
            
            
            $count = mysqli_num_rows($result);
        
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
            
            
                echo "<table class='content-container'>";
                echo "<tr>
                        <th>Item name</th>
                        <th>Item Description</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Original Price</th>
                        <th>Condition</th>
                    </tr>";
        
                while($row = mysqli_fetch_array($result)){
                $name = $row['itemName'];
                $desc = $row['itemDescription'];
                $brand = $row['itemBrand'];
                $price = $row['itemRentPrice'];
                $ogprice = $row['itemOrigPrice'];
                $condition = $row['itemCondition'];
                    
                echo "<tr>
                        <td>$name</td>
                      </tr>
                      <tr>
                        <td>$desc</td>
                      </tr>
                      <tr>
                        <td>$brand</td>
                      </tr>
                      <tr>
                        <td>$price</td>
                      </tr>
                      <tr>
                        <td>$ogprice</td>
                      </tr>
                      <tr>
                        <td>$condition</td>
                    </tr>"; 
        
                echo "</table>";
            }
            
            ?>
        </div>

    </body>
</html>