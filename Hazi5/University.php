<?php

class University extends AbstractUniversity
{

    public function addSubject(string $code, string $name): Subject
    {
        if (!$this->isSubjectExists($code, $name)) {
            $subject = new Subject($code, $name);
            $this->subjects[] = $subject;
            return $subject;
        } else {
            throw new Exception("Subject $name already exists");
        }
    }

    public function addStudentOnSubject(string $subjectCode, Student $student) : void
    {
        foreach ($this->subjects as $subject) {
            if ($subject->getCode() == $subjectCode) {
                $subject->addStudent($student->getName(), $student->getStudentNumber());
            }
        }
    }

    public function getStudentsForSubject(string $subjectCode)
    {
        foreach ($this->subjects as $subject) {
            if ($subject->getCode() == $subjectCode) {
                return $subject->getStudents();
            }
        }
        return [];
    }

    public function getNumberOfStudents(): int
    {
        $total = 0;
        foreach ($this->subjects as $subject) {
            foreach ($subject->getStudents() as $student) {
                $total ++;
            }
        }
        return $total;
    }

    public function print(): void
    {
        if (empty($this->subjects)) {
            echo "No subjects available.<br>";
            return;
        }

        foreach ($this->subjects as $subject) {
            echo $subject->getName() . "<br>";
            echo str_repeat("-", 25) . "<br>";

            $students = $subject->getStudents();
            if (empty($students)) {
                echo "No students enrolled.<br>";
            } else {
                foreach ($students as $student) {
                    echo $student->getName() . " - " . $student->getStudentNumber() . "<br>";
                }
            }
            echo "<br>";
        }
    }

    private function isSubjectExists(string $code, string $name): bool {
        if (count($this->subjects) == 0) return false;
        foreach ($this->subjects as $subject) {
            if ($subject->getCode() == $code && $subject->getName() == $name) {
                return true;
            }
        }
        return false;
    }

    public function deleteSubject(Subject $subject): void
    {
        foreach ($this->subjects as $index => $currentSubject) {
            if ($currentSubject->getCode() === $subject->getCode()) {
                if (!empty($currentSubject->getStudents())) {
                    throw new SubjectHasStudentException("Cannot delete subject {$subject->getName()}, because it has enrolled students.");
                }
                unset($this->subjects[$index]);
                $this->subjects = array_values($this->subjects);
                return;
            }
        }
    }
}