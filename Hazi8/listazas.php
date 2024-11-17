<?php

session_start();
include("database_connect.php");
$con = getDatabaseConnection();

// Bejelentkezés ellenőrzése
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM hallgatok";
$result = $con->query($sql);

echo "<a href='bevitel.php'>Új hallgató</a><br>";
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Id</th><th>Név</th><th>Szak</th><th>Átlag</th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . htmlspecialchars($row["nev"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["szak"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["atlag"]) . "</td>";
        echo "<td><a href=update.php?id=" . $row["id"] . ">Update</a></td>";
        echo "<td><a href=delete.php?id=" . $row["id"] . ">Delete</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nincsenek eredmények.";
}

$con->close();
?>
