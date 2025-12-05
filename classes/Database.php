<?php
    declare(strict_types=1);



class Database {
    
    private string $host = "localhost"; 
    private string $user = "root";
    private string $password = "";
    private string $database = "mini_crud_mvc";
    private string $charset = "utf8mb4";

    private ?PDO $conn = null;

    public function connect(): PDO
    {
        if($this->conn === null) {
            $dsn = "mysql:host={$this->host};dbname={$this->database};charset={$this->charset}";

            // Try - Catch Block
            try {
                $this->conn = new PDO($dsn, $this->user, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            } catch (PDOException $e) {
                echo "Database connection failed: " . $e->getMessage();

            }

           
        }
        return $this->conn;
    }

}

?>
