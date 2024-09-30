<?php

require_once 'config.php';

class Nutricionista {
    private $id;
    private $cpf;
    private $crn;
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
    public function getCrn() { return $this->crn; }
    public function setCrn($crn) { $this->crn = $crn; }
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
    public function setSenha($senha) { $this->senha = $senha; }

    public function cadastrar() {
        $conn = self::conectar();
        $stmt = $conn->prepare("INSERT INTO nutricionistas (cpf, crn, nome, sobrenome, data_nascimento, endereco, telefone, email, senha) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $this->cpf, $this->crn, $this->nome, $this->sobrenome, $this->data_nascimento, $this->endereco, $this->telefone, $this->email, $this->senha);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        return true;
    }

    public static function listar() {
        $conn = self::conectar();
        $result = $conn->query("SELECT * FROM nutricionistas");
        $nutricionistas = $result->fetch_all(MYSQLI_ASSOC);
        $conn->close();
        return $nutricionistas;
    }

    public static function buscarPorId($id) {
        $conn = self::conectar();
        $stmt = $conn->prepare("SELECT * FROM nutricionistas WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $nutricionista = $result->fetch_object();
        $stmt->close();
        $conn->close();
        return $nutricionista;
    }

    public function atualizar() {
        $conn = self::conectar();
        $stmt = $conn->prepare("UPDATE nutricionistas SET cpf = ?, crn = ?, nome = ?, sobrenome = ?, data_nascimento = ?, endereco = ?, telefone = ?, email = ?, senha = ? WHERE id = ?");
        $stmt->bind_param("sssssssssi", $this->cpf, $this->crn, $this->nome, $this->sobrenome, $this->data_nascimento, $this->endereco, $this->telefone, $this->email, $this->senha, $this->id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    public static function excluir($id) {
        $conn = self::conectar();
        $stmt = $conn->prepare("DELETE FROM nutricionistas WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    private static function conectar() {
        return new mysqli("localhost", "usuario", "senha", "database");
    }
}
?>
