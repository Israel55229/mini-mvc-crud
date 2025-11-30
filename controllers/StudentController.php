<?php 
    class StudentController extends Student {

        // Displaying all students
        public function showAllStudent() {
            return $this->getAllStudents();
        }

        // Displaying single student
        public function showSingleStudent($id) {
            return $this->getStudentById($id);
            
        }




    }