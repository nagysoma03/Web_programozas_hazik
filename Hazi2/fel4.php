<?php

function atalakit(&$tomb, $betu) {
    foreach ($tomb as $elem=> $ertek) {
        if ($betu == "kisbetus") {
            $tomb[$elem] = strtolower($ertek);
        } elseif ($betu == "nagybetus") {
            $tomb[$elem] = strtoupper($ertek);
        }
    }
}

function atalakitArray($tomb, $betu) {
    if ($betu == "kisbetus") {
        return array_map('strtolower', $tomb);
    } elseif ($betu == "nagybetus") {
        return array_map('strtoupper', $tomb);
    }
}

$szinek = array('A'=>'Kek','B'=>'Zold','C'=>'Piros');

echo "klasszikus:<br>";
atalakit($szinek, "kisbetus");
print_r($szinek);
echo "<br>";

atalakit($szinek, "nagybetus");
print_r($szinek);
echo "<br>";


echo "array_map:<br>";
$szinekKisbetus = atalakitArray($szinek, "kisbetus");
print_r($szinekKisbetus);
echo "<br>";

$szinekNagybetus = atalakitArray($szinek, "nagybetus");
print_r($szinekNagybetus);