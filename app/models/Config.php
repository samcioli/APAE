<?php
class Database {
    private $host = 'localhost';
    private $dbname = 'apae_db';
    private $username = 'root';
    private $password = '';

    public function getConnection() {
        try {
            $conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }
}
?>
