<?php

echo "<table border = '1'";

for ($i = 0; $i < 3; $i++) {
    echo "<tr>";
    for ($j = 0; $j < 3; $j++) {
        if (($i + $j) % 2== 0) {
            echo "<td style = 'background-color:white; width: 30px; height: 30px;'></td>";
        } else {
            echo "<td style = 'background-color:black; width: 30px; height: 30px;'></td>";
        }
    }
    echo "</tr>";
}
echo "</table>";

?>