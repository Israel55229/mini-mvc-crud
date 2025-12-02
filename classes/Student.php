<?php 
    declare(strict_types=1);

    class Student {

        private Database $db;

        public function __construct() {
            $this->db = new Database();
        }


        /* Fetch All Student From the database */
        public function getAllStudents(): array|false {
            $sql = "SELECT * FROM students";
            $stmt = $this->db->connect()->prepare($sql);

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }


        /* Fetch a Single Student From the database */
        public function getStudentById(int $id): array|false {
            $sql = "SELECT * FROM students WHERE id = ? LIMIT 1";
            $stmt = $this->db->connect()->prepare($sql);

            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

    }



?>