<?php

include("database_connect.php");
$con = getDatabaseConnection();

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS egyetem";

if ($con->query($sql) === TRUE) {
    echo "Database created successfully" . "<br>";
} else {
    echo "Error creating database: " . $con->error  . "<br>";
}
$con->select_db("egyetem");

$sql = "CREATE TABLE IF NOT EXISTS hallgatok (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nev VARCHAR(255) NOT NULL,
    szak VARCHAR(255) NOT NULL,
    atlag double NOT NULL
)";

if ($con->query($sql) === TRUE) {
    echo "Table created successfully" . "<br>";
} else {
    echo "Error creating table: " . $con->error  . "<br>";
}

$con->close();