<?php

$szorzoTabla = function ($n) {
    $color = "red";
    echo "<table border = '1'";
    for ($i = 1; $i < $n + 1; $i++) {
        echo "<tr>";
        for ($j = 1; $j < $n + 1; $j++) {
            if ($i == $j) {
                echo "<td style = 'background-color:$color; width: 30px; height: 30px;'>" . ($i * $j) . "</td>";
            } else {
                echo "<td style = 'background-color:white; width: 30px; height: 30px;'>" . ($i * $j) . "</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
};

$n = 10;
$szorzoTabla($n);



