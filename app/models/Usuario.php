<?php

class Usuario {
    private $db;

    public function __construct() {
        try {
            // Conectar ao banco de dados
            $this->db = new PDO('mysql:host=localhost;dbname=apae_db', 'root', '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro de conexão: " . $e->getMessage());
        }
    }

    // Função para buscar usuários por role
    public function buscarUsuariosPorRole($role) {
        switch ($role) {
            case 'admin':
                $query = "SELECT * FROM administradores";
                break;
            case 'funcionario':
                $query = "SELECT * FROM funcionarios";
                break;
            case 'nutricionista':
                $query = "SELECT * FROM nutricionistas";
                break;
            default:
                $query = "SELECT * FROM administradores 
                          UNION ALL 
                          SELECT * FROM funcionarios 
                          UNION ALL 
                          SELECT * FROM nutricionistas";
                break;
        }

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erro na consulta: " . $e->getMessage());
        }
    }

    // Função para excluir um usuário
    public function excluirUsuario($id) {
        $query = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
?>
