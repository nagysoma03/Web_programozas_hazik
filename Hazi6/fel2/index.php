<?php
$errors = [];
$data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Név ellenőrzése
    if (empty($_POST['name'])) {
        $errors[] = "A név mező nem lehet üres.";
    } else {
        $data['name'] = htmlspecialchars($_POST['name']);
    }

    // E-mail cím ellenőrzése
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Érvényes e-mail cím szükséges.";
    } else {
        $data['email'] = htmlspecialchars($_POST['email']);
    }

    // Jelszó ellenőrzése
    if (empty($_POST['password']) || strlen($_POST['password']) < 8 ||
        !preg_match('/[A-Z]/', $_POST['password']) ||
        !preg_match('/[0-9]/', $_POST['password']) ||
        !preg_match('/[\W]/', $_POST['password'])) {
        $errors[] = "A jelszónak legalább 8 karakterből kell állnia, és tartalmaznia kell egy nagybetűt, számot és egy speciális karaktert.";
    } else {
        $data['password'] = htmlspecialchars($_POST['password']);
    }

    // Jelszó megerősítése
    if (empty($_POST['confirm_password']) || $_POST['confirm_password'] !== $_POST['password']) {
        $errors[] = "A jelszónak és a jelszó megerősítésének egyeznie kell.";
    }

    // Születési dátum ellenőrzése
    if (empty($_POST['birthdate']) || !DateTime::createFromFormat('Y-m-d', $_POST['birthdate'])) {
        $errors[] = "Érvényes születési dátum szükséges.";
    } else {
        $data['birthdate'] = htmlspecialchars($_POST['birthdate']);
    }

    // Ha nincsenek hibák, a beküldött adatokat megjelenítjük
    if (empty($errors)) {
        echo "<h3>Beküldött adatok:</h3>";
        foreach ($data as $key => $value) {
            echo "<p><strong>" . ucfirst($key) . ":</strong> $value</p>";
        }

        // Érdeklődési területek megjelenítése
        if (!empty($_POST['interests'])) {
            $data['interests'] = $_POST['interests'];
            echo "<p><strong>Érdeklődési területek:</strong> " . implode(", ", $data['interests']) . "</p>";
        }

        // Ország megjelenítése
        if (!empty($_POST['country'])) {
            $data['country'] = $_POST['country'];
            echo "<p><strong>Ország:</strong> " . htmlspecialchars($data['country']) . "</p>";
        }

        exit;
    } elseif (!empty($errors)) {
        echo "<h3>Errors: </h3>";
        echo "<ul style='color:red;'>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Regisztrációs űrlap</title>
</head>
<body>

<h3>Regisztrációs űrlap</h3>

<form method="post" action="">
    <label for="name">Név:
        <input type="text" id="name" name="name">
    </label>
    <br><br>
    <label for="email">E-mail cím:
        <input type="email" id="email" name="email">
    </label>
    <br><br>
    <label for="password">Jelszó:
        <input type="password" id="password" name="password">
    </label>
    <br><br>
    <label for="confirm_password">Jelszó megerősítése:
        <input type="password" id="confirm_password" name="confirm_password">
    </label>
    <br><br>
    <label for="birthdate">Születési dátum:
        <input type="date" id="birthdate" name="birthdate">
    </label>
    <br><br>
    <label>Nem:
        <input type="radio" name="gender" value="male"> Férfi
        <input type="radio" name="gender" value="female"> Nő
        <input type="radio" name="gender" value="other"> Egyéb
    </label>
    <br><br>
    <label>Érdeklődési területek:
        <input type="checkbox" name="interests[]" value="Sport"> Sport
        <input type="checkbox" name="interests[]" value="Művészet"> Művészet
        <input type="checkbox" name="interests[]" value="Tudomány"> Tudomány
    </label>
    <br><br>
    <label for="country">Ország:
        <select id="country" name="country">
            <option value="">Válassz egy országot</option>
            <option value="Hungary">Magyarország</option>
            <option value="Romania">Románia</option>
            <option value="Slovakia">Szlovákia</option>
            <option value="Other">Egyéb</option>
        </select>
    </label>
    <br><br>
    <input type="submit" value="Regisztrálok"/>
</form>

</body>
</html>

