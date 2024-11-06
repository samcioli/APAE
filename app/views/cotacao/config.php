<?php

class Database {
    // Configurações do banco de dados
    private $host = 'localhost';
    private $dbname = 'apae_db';
    private $username = 'root';
    private $password = '';

    // Atributo para armazenar a conexão
    private $conn = null;

    public function getConnection() {
        if ($this->conn == null) {
            try {
                // Criar conexão PDO
                $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro na conexão: " . $e->getMessage());
            }
        }
        return $this->conn;
    }
}

?>
