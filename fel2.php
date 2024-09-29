<?php

$seconds = 7200;

$hours = $seconds / 3600;

if (is_int($seconds)) {
    echo "<b>$seconds</b> masodperc = <b>$hours</b> oraval";
} else {
    echo "Nem egesz szamot adott meg!";
}

?>