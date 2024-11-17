<?php
include("database_connect.php");
$con = getDatabaseConnection();

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nev = $_POST['nev'];
    $szak = $_POST['szak'];
    $atlag = $_POST['atlag'];

    $sql = "UPDATE hallgatok SET nev='$nev', szak='$szak', atlag='$atlag' where id='$id'";
    $result = $con->query($sql);
    header("Location: listazas.php");
} else {
    $sql = "SELECT * FROM hallgatok WHERE id=" . $_GET['id'];
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    $con->close();
}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    Nev:<input type="Text" name="nev" value="<?php echo $row["nev"]; ?>"><br>
    Szak:<input type="Text" name="szak" value="<?php echo $row["szak"]; ?>"><br>
    Atlag:<input type="Text" name="atlag" value="<?php echo $row["atlag"]; ?>"><br>
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" >
    <input type="Submit" name="submit" value="Elkuld">
</form>