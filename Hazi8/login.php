<?php
session_start();


include("database_connect.php");
$con = getDatabaseConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        echo "Succesfully logged in";

        header("Location: dashboard.php");
    } else {

        echo "Wrong username or password";
    }


    $con->close();
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Bejelentkezés</title>
</head>
<body>
<h2>Bejelentkezés</h2>
<form method="post">
    <label for="username">Felhasználónév:</label>
    <input type="text" name="username" id="username" required><br>

    <label for="password">Jelszó:</label>
    <input type="password" name="password" id="password" required><br>

    <button type="submit">Bejelentkezés</button>
</form>
</body>
</html>
