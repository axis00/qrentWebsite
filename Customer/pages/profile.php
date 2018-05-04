<?php
    require "../connectToDb.php";
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    echo "Name:  $lastName, $firstName"; 
    echo "E-mail: $email";
?>