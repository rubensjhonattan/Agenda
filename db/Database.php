<?php
// Classe para conexão com banco de dados MySQL usando PDO
class Database {
    private $host = 'localhost';
    private $dbname = 'agenda';
    private $user = 'root';
    private $pass = '';
    private $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
        return $this->conn;
    }
}
