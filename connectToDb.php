<?php
    $url = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'qrent';

    $conn = new mysqli($url,$user,$pass,$db);

    if($conn->connect_error){
        die("Can't connect to database");
    }
?>