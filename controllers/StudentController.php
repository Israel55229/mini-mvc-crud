<?php 
    class StudentController {

        private Student $student;

        public function __construct() {
            $this->student = new Student();
        }


        /* Showing or Displaying all the students in the database */ 
        public function showAllStudents(): array|false {
            $this->student->getAllStudents();
        }

        

        /* Showing or Displaying a single student through ID */
        public function showSingleStudent(int $id): array|false {
            $this->student->getStudentById($id);
        }
    }

?>