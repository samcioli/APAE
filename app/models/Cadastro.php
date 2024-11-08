<?php

require_once 'config.php';

class Cadastro {
    private $cpf;
    private $nome;
    private $sobrenome;
    private $dataNascimento;
    private $endereco;
    private $telefone;
    private $email;
    private $senha;
    private $role;

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
            $this->role = $dados['role'];
        }
    }

    public function salvar() {
        try {
            $db = new PDO('mysql:host=localhost;dbname=apae_db', 'root', '');

            // Salva de acordo com a função
            if ($this->role === 'admin') {
                $stmt = $db->prepare("INSERT INTO administradores (cpf, nome, sobrenome, data_nascimento, endereco, telefone, email, senha, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            } elseif ($this->role === 'funcionario') {
                $stmt = $db->prepare("INSERT INTO funcionarios (cpf, nome, sobrenome, data_nascimento, endereco, telefone, email, senha, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            } elseif ($this->role === 'nutricionista') {
                $stmt = $db->prepare("INSERT INTO nutricionistas (cpf, nome, sobrenome, data_nascimento, endereco, telefone, email, senha, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            }

            if ($stmt) {
                return $stmt->execute([
                    $this->cpf, $this->nome, $this->sobrenome, $this->dataNascimento, 
                    $this->endereco, $this->telefone, $this->email, $this->senha, $this->role
                ]);
            }

            return false;

        } catch (PDOException $e) {
            // Tratar erro de conexão ou inserção
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
    public function getRole() { return $this->role; }
}
?>
