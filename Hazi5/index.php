<?php

include "loader.php";

$university = new University();
$webprog = null;
$database = null;

try {
    $webprog = $university ->addSubject('101', 'Web programming');
    $database = $university ->addSubject('102', 'Database programming');
} catch (Exception $e) {
    echo $e->getMessage();
}

$student1 = new Student('301', 'Jancsi');
$student2 = new Student('302', 'Jozsi');

try {
    $university->addStudentOnSubject('101', $student1);
    $university->addStudentOnSubject('101', $student2);
    $university->addStudentOnSubject('102', $student1);
} catch (Exception $e) {
    echo $e->getMessage();
}

echo "<h3>All Subjects and Students</h3>";
$university->print();


// HF
// Jegyek hozzáadása a hallgatókhoz
echo "<h3>Adding Grades for Students</h3>";
try {
    $student1->addGrade($webprog, 8.0);   // Jancsi kap egy 8.0-as jegyet Web programming-re
    $student1->addGrade($database, 9.5);  // Jancsi kap egy 9.5-es jegyet Database programming-re
    $student2->addGrade($webprog, 7.0);   // Jozsi kap egy 7.0-es jegyet Web programming-re
} catch (Exception $e) {
    echo $e->getMessage();
}

// Hallgatók jegyeinek kiíratása
echo "<h3>Student Grades</h3>";
echo "<b>Jancsi jegyei:</b><br>";
$student1->printGrades();
echo "<br>";
echo "<b>Jozsi jegyei:</b><br>";
$student2->printGrades();

// Átlagjegy számítása és kiíratása
echo "<h3>Average Grades</h3>";
echo "Jancsi avg: " . $student1->getAvgGrade() . "<br>";
echo "Jozsi avg: " . $student2->getAvgGrade() . "<br>";

// Tantárgy törlésének tesztelése
echo "<h3>Delete Subject with Students</h3>";
try {
    $university->deleteSubject($webprog); // Ez kivételt kell dobjon, mivel a tantárgyhoz tartoznak hallgatók
} catch (SubjectHasStudentException $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}

// Hallgatók eltávolítása a tantárgyról és a tantárgy törlése
echo "<h3>Removing Students from Web programming and deleting the subject</h3>";
try {
    $subjectStudents = $webprog->getStudents();
    foreach ($subjectStudents as $student) {
        $webprog->deleteStudent($student->getStudentNumber()); // Hallgatók törlése a Web programming tantárgyról
    }
    $university->deleteSubject($webprog); // Most sikeresen törölnie kell
    echo "Web programming deleted.<br>";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}

echo "<h3>Checking number of students in University</h3>";
echo "Number of students: " . $university->getNumberOfStudents() . "<br>";


// 5. feladat
$student3 = new Student('303', 'Juli');
$student4 = new Student('304', 'Peti');
$student5 = new Student('305', 'Zoli');

$student3->addGrade($webprog, 8.0);
$student3->addGrade($database, 9.5);
$student4->addGrade($webprog, 7.0);
$student4->addGrade($database, 6.5);
$student5->addGrade($webprog, 9.0);
$student5->addGrade($database, 8.0);

$students = [$student3, $student4, $student5];

function sortStudents(array &$students): void
{
    usort($students, function ($a, $b) {
        return $b->getAvgGrade() <=> $a->getAvgGrade();
    });
}

sortStudents($students);

echo "<h3>Students sorted:</h3>";
foreach ($students as $student) {
    echo "Name: " . $student->getName() . " - Avg grade: " . $student->getAvgGrade() . "<br>";
}


