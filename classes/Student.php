<?php 
    class Student extends Database {

        // Fetch all the student available in the database
        public function getAllStudents() {
            $sql = "SELECT * FROM students";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }



        // Fetching a single row of student values based on the student id
        public function getStudentById($id) {
            $sql = "SELECT * FROM students WHERE id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }