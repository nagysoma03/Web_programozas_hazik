<?php

$tomb = [5, '5', '05', '12.3', '16.7', 'five', 'true', 0xDECAFBAD, '10e200'];

foreach ($tomb as $x) {
    echo gettype($x);
    if (is_numeric($x)) {
        echo " Igen" . "<br>";
    } else {
        echo " Nem" . "<br>";
    }
}

?>