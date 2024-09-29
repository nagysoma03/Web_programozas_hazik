<?php

$szam1 = 4;
$szam2 = 5;
$muvelet = "/";


switch ($muvelet) {
    case "+":
        $eredmeny = $szam1 + $szam2;
        echo "$szam1 + $szam2 = $eredmeny";
        break;
    
    case "-":
        $eredmeny = $szam1 - $szam2;
        echo "$szam1 - $szam2 = $eredmeny";
        break;

    case "*":
        $eredmeny = $szam1 * $szam2;
        echo "$szam1 * $szam2 = $eredmeny";
        break;
    
    case "/":
        if ($szam1 == 0 or $szam2 == 0) {
            echo "0-val torteno osztas nem lehetseges.";
        } else {
            $eredmeny = $szam1 / $szam2;
            echo "$szam1 / $szam2 = $eredmeny";
        }
        break;

    default:
        echo "Hibas muveletjelet adott meg. (+  -  *  /)";
}
?>