<?php
include "ArrayManipulator.php";

$manipulator = new ArrayManipulator();

// __set és __get tesztelése
$manipulator->name = "John";
$manipulator->age = 30;
echo $manipulator->name . "<br>"; // Kiírja: John
echo $manipulator->age . "<br>"; // Kiírja: 30

// __isset tesztelése
if (isset($manipulator->name)) {
    echo 'name' ."<br>";
}

// __unset tesztelése
unset($manipulator->age);
if (!isset($manipulator->age)) {
    echo 'age' ."<br>";
}

// __toString tesztelése
echo $manipulator . "<br>"; // Kiírja a tömb tartalmát JSON formátumban

// __clone tesztelése
$manipulator2 = clone $manipulator;
$manipulator2->name = "Jane";
echo "Eredeti name: " . $manipulator->name . "<br>"; // John
echo "Klónozott name: " . $manipulator2->name . "<br>"; // Jane

?>