<?php
require_once 'config.php';

class Nutricionista {
    private $db;
    private $id;
    private $cpf;
    private $nome;
    private $sobrenome;
    private $data_nascimento;
    private $endereco;
    private $telefone;
    private $email;
    private $senha;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    // Setters
    public function setCpf($cpf) { $this->cpf = $cpf; }
    public function setNome($nome) { $this->nome = $nome; }
    public function setSobrenome($sobrenome) { $this->sobrenome = $sobrenome; }
    public function setDataNascimento($data_nascimento) { $this->data_nascimento = $data_nascimento; }
    public function setEndereco($endereco) { $this->endereco = $endereco; }
    public function setTelefone($telefone) { $this->telefone = $telefone; }
    public function setEmail($email) { $this->email = $email; }
    public function setSenha($senha) { $this->senha = password_hash($senha, PASSWORD_DEFAULT); }

    public function cadastrar() {
        $query = "INSERT INTO nutricionistas (cpf, nome, sobrenome, data_nascimento, endereco, telefone, email, senha) VALUES (:cpf, :nome, :sobrenome, :data_nascimento, :endereco, :telefone, :email, :senha)";
        $stmt = $this->db->prepare($query);
        
        // Bind dos parâmetros
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':sobrenome', $this->sobrenome);
        $stmt->bindParam(':data_nascimento', $this->data_nascimento);
        $stmt->bindParam(':endereco', $this->endereco);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);

        return $stmt->execute();
    }

    public static function buscarPorEmail($email) {
        $db = (new Database())->getConnection();
        $query = "SELECT * FROM nutricionistas WHERE email = :email";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function listar() {
        $db = (new Database())->getConnection();
        $query = "SELECT * FROM nutricionistas";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>
