<?php

$honap = "december";

switch ($honap) {
    case "marcius":
    case "aprilis":
    case "majus":
        echo "Tavasz van";
        break;

    case "junius":
    case "julius":
    case "augusztus":
        echo "Nyar van";
        break;

    case "szeptember":
    case "oktober":
    case "november":
        echo "Osz van";
        break;

    case "december":
    case "januar":
    case "februar":
        echo "Tel van";
        break;

    default:
        echo "Nem letezik ilyen honap, vagy nem megfelelo formaban irta be.";
}

if ($honap == "marcius" or $honap == "aprilis" or $honap == "majus") {
    echo "Tavasz van";
} elseif ($honap == "junius" or $honap == "julius" or $honap == "augusztus") {
    echo "Nyar van";
} elseif ($honap == "szeptember" or $honap == "oktober" or $honap == "november") {
    echo "Osz van";
} elseif ($honap == "december" or $honap == "januar" or $honap == "februar") {
    echo "Tel van";
} else {
    echo "Nem letezik ilyen honap, vagy nem megfelelo formaban irta be.";
}
?>