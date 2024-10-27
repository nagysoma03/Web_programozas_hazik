<?php

class Student
{
    private string $studentNumber;
    private string $name;
    private array $grades = [];

    /**
     * @param int $studentNumber
     * @param name $name
     */
    public function __construct(string $studentNumber, string $name)
    {
        $this->studentNumber = $studentNumber;
        $this->name = $name;
    }

    public function __toString()
    {
        return "Nev: $this->name, $this->studentNumber";
    }


    public function getStudentNumber(): string
    {
        return $this->studentNumber;
    }

    public function setStudentNumber(string $studentNumber): void
    {
        $this->studentNumber = $studentNumber;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function addGrade(Subject $subject, float $grade): void
    {
        $this->grades[$subject->getCode()] = $grade;
    }

    public function getAvgGrade(): float
    {
        if (empty($this->grades)) {
            return 0.0;
        }

        return array_sum($this->grades) / count($this->grades);
    }

    public function printGrades(): void
    {
        if (empty($this->grades)) {
            echo "No grades. <br>";
            return;
        }

        foreach ($this->grades as $courseCode => $grade) {
            echo "Course code: $courseCode - Grade: $grade <br>";
        }
    }


}