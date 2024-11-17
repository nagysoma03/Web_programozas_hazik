<?php
function getDatabaseConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "egyetem";

    // Kapcsolat létrehozása
    $con = new mysqli($servername, $username, $password, $dbname);

    if ($con->connect_error) {
        die("Connection error: " . $con->connect_error . "<br>");
    }

    return $con;
}
?>