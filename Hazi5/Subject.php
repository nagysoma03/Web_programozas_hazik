<?php

class Subject
{
    private int $code;
    private string $name;
    private array $students = [];

    public function __construct(int $code, string $name)
    {
        $this->code = $code;
        $this->name = $name;
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function setCode(int $code): void
    {
        $this->code = $code;
    }

    public function getStudents(): array
    {
        return $this->students;
    }

    public function setStudents(array $students): void
    {
        $this->students = $students;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return "Tantargy: $this->name Kod: $this->code Diakok: $this->students";
    }

    public function addStudent(string $name, string $studentNumber) : Student
    {
        if (!$this->isStudentExists($studentNumber)) {
            $student = new Student($name, $studentNumber);
            $this->students[] = $student;
            return $student;
        } else {
            throw new Exception("Student $studentNumber already exists");
        }
    }

    private function isStudentExists($studentNumber)
    {
        if (count($this->students) == 0) return false;
        foreach ($this->students as $student) {
            if ($student->getStudentNumber() == $studentNumber) {
                return true;
            }
        }
        return false;
    }

    public function deleteStudent(string $studentNumber): bool
    {
        foreach ($this->students as $index => $student) {
            if ($student->getStudentNumber() === $studentNumber) {
                unset($this->students[$index]);
                $this->students = array_values($this->students);
                return true;
            }
        }
        return false;
    }



}