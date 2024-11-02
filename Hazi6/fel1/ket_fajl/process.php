<?php
$errors = [];
$data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['firstName'])) {
        $errors[] = "First name is required.";
    } else {
        $data['First Name'] = htmlspecialchars($_POST['firstName']);
    }

    if (empty($_POST['lastName'])) {
        $errors[] = "Last name is required.";
    } else {
        $data['Last Name'] = htmlspecialchars($_POST['lastName']);
    }

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email is required.";
    } else {
        $data['Email'] = htmlspecialchars($_POST['email']);
    }

    if (empty($_POST['attend'])) {
        $errors[] = "At least one selection is required.";
    } else {
        $data['Attending Events'] = implode(", ", $_POST['attend']);
    }

    if (!isset($_POST['terms'])) {
        $errors[] = "You must agree to terms and conditions.";
    } else {
        $data['Terms Accepted'] = "Yes";
    }

    if (empty($_FILES['abstract']['name'])) {
        $errors[] = "Upload is required.";
    } else {
        $fileType = strtolower(pathinfo($_FILES['abstract']['name'], PATHINFO_EXTENSION));
        if ($fileType != "pdf" || $_FILES['abstract']['size'] > 3 * 1024 * 1024) {
            $errors[] = "Only PDF files up to 3MB are allowed for abstract.";
        } else {
            $data['Abstract File'] = htmlspecialchars($_FILES['abstract']['name']);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Registration Result</title>
</head>
<body>

<?php
if ($errors) {
    echo "<h3>Errors:</h3><ul>";
    foreach ($errors as $error) {
        echo "<li style='color:red;'>$error</li> ";
    }
    echo "</ul><br>";
} else {
    echo "<h3>Submitted Data:</h3>";
    foreach ($data as $key => $value) {
        echo "<p><strong>$key:</strong> $value</p>";
    }
}
?>

</body>
</html>

