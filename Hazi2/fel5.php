<?php

$lista = [];

function hozzaAd(&$lista, $nev, $mennyiseg, $egysegAr) {
    $lista[] = ["nev"=>$nev,"mennyiseg"=>$mennyiseg,"egysegAr"=>$egysegAr];
}

function eltavolitas(&$lista, $nev) {
    foreach ($lista as $elem => $termek) {
        if ($termek["nev"] == $nev) {
            unset($lista[$elem]);
        }
    }
}

function kiiratas($lista) {
    if (empty($lista)) {
        echo "A bevasarlolista ures.\n";
    } else {
        foreach ($lista as $elem) {
            echo "Név: {$elem['nev']}, Mennyiség: {$elem['mennyiseg']}, Egységár: {$elem['egysegAr']}<br>";
        }
    }
}

function osszkoltseg($lista) {
    $osszeg = 0;
    foreach ($lista as $elem) {
        $osszeg += $elem["mennyiseg"] * $elem["egysegAr"];
    }
    echo "A bevasarlolista osszkoltsege: $osszeg";
}

kiiratas($lista);
echo "<br>";

hozzaAd($lista, "Kenyer", 2, 8.5);
hozzaAd($lista, "Viz", 1, 2.5);

kiiratas($lista);

osszkoltseg($lista);

eltavolitas($lista, "Viz");
echo "<br>";
kiiratas($lista);
osszkoltseg($lista);