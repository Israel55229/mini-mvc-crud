<?php
    declare(strict_types=1);


    class StudentController {

        private Student $student;

        public function __construct() {
            $this->student = new Student();
        }
        
        /* Inserting Data into the database */
        public function insertStudent(string $fullname, string $email, string $program, string $phone): bool{
            return $this->student->createStudent($fullname, $email, $program, $phone);
        }


        /* Showing or Displaying all the students in the database */ 
        public function showAllStudents(): array|false {
            return $this->student->getAllStudents();
        }

        

        /* Showing or Displaying a single student through ID */
        public function showSingleStudent(int $id): array|false {
            return $this->student->getStudentById($id);
        }

        // Update Student
        public function editStudent(int $id, string $fullname, string $email, string $program, string $phone) : bool {
            return $this->student->updateStudent($id, $fullname, $email, $program, $phone);
        }


        // Delete Student
        public function delete(int $id): bool {
            return $this->student->deleteStudent($id);
        }


    }

?>