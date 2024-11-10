<?php
// Ha a felhasználó számológépet használ
if (isset($_POST["elkuld"])) {
    $szam1 = $_POST["szam1"];
    $szam2 = $_POST["szam2"];
    $muv = $_POST["muv"];

    // Ellenőrizzük, hogy a számok érvényesek-e
    if (is_numeric($szam1) && is_numeric($szam2)) {
        switch ($muv) {
            case "+":
                $eredmeny = $szam1 + $szam2;
                break;
            case "-":
                $eredmeny = $szam1 - $szam2;
                break;
            case "*":
                $eredmeny = $szam1 * $szam2;
                break;
            case "/":
                if ($szam2 == 0) {
                    echo "Hiba: nullával való osztás!";
                    exit;
                } else {
                    $eredmeny = $szam1 / $szam2;
                }
                break;
            default:
                echo "Hibás művelet!";
                exit;
        }

        echo "Eredmény: " . $eredmeny . "<br>";

        // Ha a felhasználó eltalálja a számot
        if (isset($_COOKIE["randomNumber"])) {
            // Ellenőrizzük, hogy eltalálta-e a véletlen számot
            if ($eredmeny == $_COOKIE["randomNumber"]) {
                echo "<p style='color:green;'>Gratulálok! Eltaláltad a számot!</p><br>";

                // Új véletlen szám generálása és tárolása
                $randomNumber = rand(1, 100);
                setcookie("randomNumber", $randomNumber, time() + 3600, "/");
            } else {
                echo "<p style='color:red;'>Hibás szám, próbálkozz újra!</p><br>";
            }
        } else {
            echo "A véletlen szám még nem lett generálva!";
        }
    } else {
        echo "Számokat adjon meg!";
    }
}

// Ha még nem generáltunk véletlen számot, generálunk egyet
if (!isset($_COOKIE["randomNumber"])) {
    $randomNumber = rand(1, 100);
    setcookie("randomNumber", $randomNumber, time() + 3600, "/");
}
?>

<form method="POST" action="">
    <br>Az első szám:
    <input type="number" name="szam1" required>
    <br>A második szám:
    <input type="number" name="szam2" required>
    <br>Műveleti jel:
    <select name="muv">
        <option>+</option>
        <option>-</option>
        <option>*</option>
        <option>/</option>
    </select><br>
    <input type="submit" name="elkuld" value="Számol">
</form>

