<?php

    class Database {
        private $host = "localhost"; 
        private $user = "root";
        private $password = "";
        private $database = "mini_crud_mvc";
        private $charset = "utf8mb4";

        private $conn;

        public function connect() {
            if($this->conn === null) {
                $dsn = "mysql:host={$this->host};dbname={$this->database};charset={$this->charset}";

                // Try - Catch Block
                try {
                    $this->conn = new PDO($dsn, $this->user, $this->password);
                    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                } catch (PDOException $e) {
                    echo "Database connection failed: " . $e->getMessage();

                }

                return $this->conn;
            }
        }

    }

?>
