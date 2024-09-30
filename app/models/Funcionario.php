<?php

require_once 'config.php';

class Funcionario {
    private $id;
    private $cpf;
    private $nome;
    private $sobrenome;
    private $data_nascimento;
    private $endereco;
    private $telefone;
    private $email;
    private $senha;

    // Getters e Setters
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getCpf() { return $this->cpf; }
    public function setCpf($cpf) { $this->cpf = $cpf; }

    public function getNome() { return $this->nome; }
    public function setNome($nome) { $this->nome = $nome; }

    public function getSobrenome() { return $this->sobrenome; }
    public function setSobrenome($sobrenome) { $this->sobrenome = $sobrenome; }

    public function getDataNascimento() { return $this->data_nascimento; }
    public function setDataNascimento($data_nascimento) { $this->data_nascimento = $data_nascimento; }

    public function getEndereco() { return $this->endereco; }
    public function setEndereco($endereco) { $this->endereco = $endereco; }

    public function getTelefone() { return $this->telefone; }
    public function setTelefone($telefone) { $this->telefone = $telefone; }

    public function getEmail() { return $this->email; }
    public function setEmail($email) { $this->email = $email; }

    public function getSenha() { return $this->senha; }
    public function setSenha($senha) { $this->senha = password_hash($senha, PASSWORD_DEFAULT); }

    // Cadastrar funcionário
    public function cadastrar() {
        if ($this->validarDados()) {
            $conn = $this->conectar();
            $stmt = $conn->prepare("INSERT INTO funcionarios (cpf, nome, sobrenome, data_nascimento, endereco, telefone, email, senha) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $this->cpf, $this->nome, $this->sobrenome, $this->data_nascimento, $this->endereco, $this->telefone, $this->email, $this->senha);
            $stmt->execute();
            $stmt->close();
            $conn->close();
            return true;
        }
        return false;
    }

    // Listar funcionários
    public static function listar() {
        $conn = self::conectar();
        $result = $conn->query("SELECT * FROM funcionarios");
        $funcionarios = $result->fetch_all(MYSQLI_ASSOC);
        $conn->close();
        return $funcionarios;
    }

    // Buscar por ID
    public static function buscarPorId($id) {
        $conn = self::conectar();
        $stmt = $conn->prepare("SELECT * FROM funcionarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $funcionario = $result->fetch_object();
        $stmt->close();
        $conn->close();
        return $funcionario;
    }

    // Buscar por Email
    public static function findByEmail($email) {
        $conn = self::conectar();
        $stmt = $conn->prepare("SELECT * FROM funcionarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $funcionario = $result->fetch_assoc(); // Retorna os dados do funcionário
        $stmt->close();
        $conn->close();
        return $funcionario; // Retorna null se não encontrar
    }

    // Atualizar funcionário
    public function atualizar() {
        if ($this->validarDados()) {
            $conn = self::conectar();
            $stmt = $conn->prepare("UPDATE funcionarios SET cpf = ?, nome = ?, sobrenome = ?, data_nascimento = ?, endereco = ?, telefone = ?, email = ?, senha = ? WHERE id = ?");
            $stmt->bind_param("ssssssssi", $this->cpf, $this->nome, $this->sobrenome, $this->data_nascimento, $this->endereco, $this->telefone, $this->email, $this->senha, $this->id);
            $stmt->execute();
            $stmt->close();
            $conn->close();
            return true;
        }
        return false;
    }

    // Excluir funcionário
    public static function excluir($id) {
        $conn = self::conectar();
        $stmt = $conn->prepare("DELETE FROM funcionarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    // Conectar ao banco de dados
    private static function conectar() {
        return new mysqli("localhost", "root", "", "apae_db");
    }

    // Validar dados
    private function validarDados() {
        if (empty($this->cpf) || empty($this->nome) || empty($this->sobrenome) || empty($this->email) || !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }
}
?>
