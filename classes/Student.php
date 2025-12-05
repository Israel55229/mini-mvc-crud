<?php 
    declare(strict_types=1);

    class Student {

        private Database $db;

        public function __construct() {
            $this->db = new Database();
        }

        // THE CREATE SECTION OF CRUD OPERATION (C = create)
        // Inserting data into the database
        public function createStudent(string $fullname, string $email, string $program, string $phone): bool {
            $sql = "INSERT INTO students (fullname, email, program, phone) VALUES (?, ?, ?, ?)";
            $stmt = $this->db->connect()->prepare($sql);

            return $stmt->execute([$fullname, $email, $program, $phone]);
        }

        // THE READ SECTION OF CRUD OPERATION (R = read)
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

        // THE UPDATE SECTION OF CRUD OPERATION (U = update)
        public function updateStudent(int $id, string $fullname, string $email, string $program, string $phone): bool {
            $sql = "UPDATE students SET fullname = ?, email = ?, program = ?, phone = ? WHERE id = ?";
            $stmt = $this->db->connect()->prepare($sql);

            return $stmt->execute([$fullname, $email, $program, $phone, $id]);

        }


        /* THE DELECT SECTION OF THE CRUD OPERATION (D = Delete) */
        public function deleteStudent(int $id): bool {
            $sql = "DELETE FROM students WHERE id = ?";
            $stmt = $this->db->connect()->prepare($sql);

            return $stmt->execute([$id]);
        }



    }






?>