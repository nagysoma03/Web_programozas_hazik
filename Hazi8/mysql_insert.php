<?php

include 'database_connect.php';
$con = getDatabaseConnection();

// Users tábla létrehozása
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";
if ($con->query($sql) === TRUE) {
    echo "Table succesfully created." . "<br>";
} else {
    echo "An error occured: " . $con->error . "<br>";
}

// Hallgatók adatai
$studentsData = array(
    array('John Doe', 'Informatika', 5.2),
    array('Alice Smith', 'Műszaki Informatika', 7.9),
    array('Bob Johnson', 'Gazdaságinformatika', 8.8),
    array('Eva Wilson', 'Matematika', 9.5),
    array('Mike Brown', 'Fizika', 5.0),
    array('Sarah Davis', 'Kémia', 3.7),
    array('David Lee', 'Biológia', 8.1),
    array('Linda Martinez', 'Informatika', 8.8),
    array('Tom Miller', 'Műszaki Informatika', 5.3),
    array('Karen Wilson', 'Gazdaságinformatika', 6.5)
);

foreach ($studentsData as $student) {
    $sql = "INSERT INTO hallgatok(nev, szak, atlag) VALUES ('$student[0]', '$student[1]', '$student[2]')";
    if ($con->query($sql) === TRUE) {
        echo "New record for " . $student[0] . " created successfully<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error . "<br>";
    }
}

$con->close();