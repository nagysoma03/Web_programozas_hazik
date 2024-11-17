<?php

include("database_connect.php");
$con = getDatabaseConnection();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM hallgatok WHERE id=$id";
    if ($con->query($sql) === TRUE) {
//        echo "Record deleted successfully";
        header('Location: listazas.php');
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
