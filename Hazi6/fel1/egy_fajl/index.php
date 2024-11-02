<?php
$errors = [];
$data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['firstName'])) {
        $errors[] = "First name is required.";
    } else {
        $data['firstName'] = htmlspecialchars($_POST['firstName']);
    }

    if (empty($_POST['lastName'])) {
        $errors[] = "Last name is required.";
    } else {
        $data['lastName'] = htmlspecialchars($_POST['lastName']);
    }

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email is required.";
    } else {
        $data['email'] = htmlspecialchars($_POST['email']);
    }

    if (empty($_POST['attend'])) {
        $errors[] = "At least one selection is required.";
    } else {
        $data['attend'] = $_POST['attend'];
    }

    if (!isset($_POST['terms'])) {
        $errors[] = "You must agree to terms and conditions.";
    } else {
        $data['terms'] = "Yes";
    }

    if (empty($_FILES['abstract']['name'])) {
        $errors[] = "Upload is required.";
    } else {
        $fileType = strtolower(pathinfo($_FILES['abstract']['name'], PATHINFO_EXTENSION));
        if ($fileType != "pdf" || $_FILES['abstract']['size'] > 3 * 1024 * 1024) {
            $errors[] = "Only PDF files up to 3MB are allowed for abstract.";
        } else {
            $data['abstract'] = htmlspecialchars($_FILES['abstract']['name']);
        }
    }

    // Ha nincsenek hibák, a beküldött adatokat megjelenítjük
    if (empty($errors)) {
        echo "<h3>Submitted Data:</h3>";
        foreach ($data as $key => $value) {
            if ($key == 'attend') {
                $value = implode(", ", $value);
            }
            echo "<p><strong>" . ucfirst($key) . ":</strong> $value</p>";
        }
        exit;
    } elseif (!empty($errors)) {
        echo "<h3>Errors:</h3>";
        echo "<ul style='color:red;'>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
}
?>

<h3>Online conference registration</h3>

<form method="post" action="" enctype="multipart/form-data">
    <label for="fname"> First name:
        <input type="text" name="firstName">
    </label>
    <br><br>
    <label for="lname"> Last name:
        <input type="text" name="lastName">
    </label>
    <br><br>
    <label for="email"> E-mail:
        <input type="text" name="email">
    </label>
    <br><br>
    <label for="attend"> I will attend:<br>
        <input type="checkbox" name="attend[]" value="Event1">Event 1<br>
        <input type="checkbox" name="attend[]" value="Event2">Event2<br>
        <input type="checkbox" name="attend[]" value="Event3">Event2<br>
        <input type="checkbox" name="attend[]" value="Event4">Event3<br>
    </label>
    <br><br>
    <label for="tshirt"> What's your T-Shirt size?<br>
        <select name="tshirt">
            <option value="P">Please select</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select>
    </label>
    <br><br>
    <label for="abstract"> Upload your abstract<br>
        <input type="file" name="abstract"/>
    </label>
    <br><br>
    <input type="checkbox" name="terms" value="">I agree to terms & conditions.<br>
    <br><br>
    <input type="submit" name="submit" value="Send registration"/>
</form>

