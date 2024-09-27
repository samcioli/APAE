<?php
class Cadastro {
    private $cpf;
    private $nome;
    private $sobrenome;
    private $dataNascimento;
    private $endereco;
    private $telefone;
    private $email;
    private $senha;
    private $role; // Adicionado para armazenar a função do usuário

    public function __construct($dados = []) {
        if (!empty($dados)) {
            $this->cpf = $dados['cpf'];
            $this->nome = $dados['nome'];
            $this->sobrenome = $dados['sobrenome'];
            $this->dataNascimento = $dados['data_nascimento'];
            $this->endereco = $dados['endereco'];
            $this->telefone = $dados['telefone'];
            $this->email = $dados['email'];
            $this->senha = password_hash($dados['senha'], PASSWORD_DEFAULT);
            $this->role = $dados['role']; // Armazena a função
        }
    }

    public function salvar() {
        try {
            $db = new PDO('mysql:host=localhost;dbname=apae_db', 'root', '');
            $stmt = $db->prepare("INSERT INTO administradores (cpf, nome, sobrenome, data_nascimento, endereco, telefone, email, senha, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            return $stmt->execute([$this->cpf, $this->nome, $this->sobrenome, $this->dataNascimento, $this->endereco, $this->telefone, $this->email, $this->senha, $this->role]);
        } catch (PDOException $e) {
            return false;
        }
    }

    // Getters e Setters
    public function getCpf() { return $this->cpf; }
    public function getNome() { return $this->nome; }
    public function getSobrenome() { return $this->sobrenome; }
    public function getDataNascimento() { return $this->dataNascimento; }
    public function getEndereco() { return $this->endereco; }
    public function getTelefone() { return $this->telefone; }
    public function getEmail() { return $this->email; }
    public function getRole() { return $this->role; } // Getter para a função
}
?>
