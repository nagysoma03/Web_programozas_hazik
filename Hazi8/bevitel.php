<?php
session_start();
include 'database_connect.php';
$con = getDatabaseConnection();

// Bejelentkezés ellenőrzése
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['hozzaad'])) {
    $nev = $_POST['nev'];
    $szak = $_POST['szak'];
    $atlag = $_POST['atlag'];

    $sql = "INSERT INTO hallgatok(nev, szak, atlag) VALUES ('$nev', '$szak', '$atlag')";

    if ($con->query($sql) === TRUE) {
        echo "New record for " . $nev . " created successfully<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error . "<br>";
    }
}

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Új hallgató hozzáadása</title>
</head>
<body>
<h2>Új hallgató hozzáadása</h2>
<form method="post">
    <label for="nev">Név:</label>
    <input type="text" name="nev" id="nev" required><br>

    <label for="szak">Szak:</label>
    <input type="text" name="szak" id="szak" required><br>

    <label for="atlag">Átlag:</label>
    <input type="text" name="atlag" id="atlag" required><br>

    <button type="submit" name="hozzaad">Hozzáad</button>
</form>
</body>
</html>