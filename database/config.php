<?php

public function getConnection() {
    if ($this->conn == null) {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexão bem-sucedida!";
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }
    return $this->conn;
}

class Database {
    // Configurações do banco de dados
    private $host = 'localhost';
    private $dbname = 'apae_db';
    private $username = 'root';
    private $password = '';
    
    // Atributo para armazenar a conexão
    private $conn;

    // Método para obter a conexão
    public function getConnection() {
        // Verifica se a conexão já foi estabelecida
        if ($this->conn == null) {
            // Tenta estabelecer uma nova conexão
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->conn;
    }
}
?>
