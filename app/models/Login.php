<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/APAE/database/config.php'); // Classe para conexão com o banco de dados

class Login {
    private $db;

    public function __construct() {
        $this->db = new Database(); // Inicializa a conexão com o banco
    }

    public function buscarPorEmail($email) {
        // Método para buscar o usuário pelo email
        $query = "SELECT * FROM usuarios WHERE email = :email"; // Ajuste conforme sua tabela
        $stmt = $this->db->getConnection()->prepare($query); // Usa o método getConnection
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ); // Retorna o usuário como objeto
    }

    public function verificarSenha($senha, $senhaHash) {
        // Método para verificar a senha
        return password_verify($senha, $senhaHash);
    }
}
