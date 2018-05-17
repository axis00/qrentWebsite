<!DOCTYPE HTML>
<html>
<?php
    require "../php/session.php";
    ?>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../styles/style.css">
        <link rel="stylesheet" href="../styles/bootstrap-4.0.0/dist/css/bootstrap.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <title>Qrent</title>
    </head>

    <body style="background-color: #F7EBEC;">
        <?php include 'nav.html'?>
        <div class="container mt-5">
            <img src="../images/qrent-logo.png" width="200px" height="200px" style="margin-top:100px; float: 0;"/>
            <form action = "./search.php" method="GET">
                <div class="input-group mt-5">
                    <input type="text" class="form-control" placeholder="Search an item..." style="padding:15px;">
                    <div class="input-group-append">
                        <input type = "submit" class="btn btn-outline-secondary" value="Search">
                    </div>
                </div>
            </form>
        </div>
    </body>

</html>