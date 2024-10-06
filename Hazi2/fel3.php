<?php

$napok = array(
    "HU"=>array("H","K","Sze","Cs","P","Sz","V"),
    "EN"=>array("M","Tu","W","Th","F","Sa","Su"),
    "DE"=>array("Mo","Di","Mi","Do","F","Sa","So"),
);

foreach($napok as $orszag=>$napokLista) {
    echo "$orszag: ";
    foreach($napokLista as $nap) {
        if($nap == "K" || $nap == "Cs" || $nap == "Sz" ||
            $nap == "Tu" || $nap == "Th" || $nap == "Sa" ||
            $nap == "Di" || $nap == "Do") {
            echo "<b>$nap, </b>";
        } else {
            echo "$nap, ";
        }
    }
    echo "<br>";
}
