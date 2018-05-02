<?php
    require "../connectToDb.php";
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $birthday = $_POST["birthday"];
    echo "Hi $firstName $lastName, your birthday is $birthday";
?>