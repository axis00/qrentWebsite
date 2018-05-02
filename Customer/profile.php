<?php
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $birthMonth = $_POST["month"];
    $birthDay = $_POST["day"];
    $birthYear = $_POST["year"];
    $birthday = "$birthMonth $birthDay, $birthYear ";
    echo "Hi $firstName $lastName, your birthday is $birthday";
?>