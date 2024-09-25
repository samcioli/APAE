<?php
class Fornecedor {
    private $id;
    private $nome;
    private $endereco;
    private $ramo_atuacao;
    private $telefone;
    private $whatsapp;
    private $email;

    // Getters e Setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getRamoAtuacao() {
        return $this->ramo_atuacao;
    }

    public function setRamoAtuacao($ramo_atuacao) {
        $this->ramo_atuacao = $ramo_atuacao;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getWhatsapp() {
        return $this->whatsapp;
    }

    public function setWhatsapp($whatsapp) {
        $this->whatsapp = $whatsapp;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    // Métodos para interagir com o banco de dados
    private static function conectar() {
        return new mysqli("localhost", "usuario", "senha", "database");
    }

    public function cadastrar() {
        $conn = self::conectar();
        $stmt = $conn->prepare("INSERT INTO fornecedores (nome, endereco, ramo_atuacao, telefone, whatsapp, email) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $this->nome, $this->endereco, $this->ramo_atuacao, $this->telefone, $this->whatsapp, $this->email);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    public static function listar() {
        $conn = self::conectar();
        $result = $conn->query("SELECT * FROM fornecedores");
        $fornecedores = $result->fetch_all(MYSQLI_ASSOC);
        $conn->close();
        return $fornecedores;
    }

    public static function buscarPorId($id) {
        $conn = self::conectar();
        $stmt = $conn->prepare("SELECT * FROM fornecedores WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $fornecedor = $result->fetch_object();
        $stmt->close();
        $conn->close();
        return $fornecedor;
    }

    public function atualizar() {
        $conn = self::conectar();
        $stmt = $conn->prepare("UPDATE fornecedores SET nome = ?, endereco = ?, ramo_atuacao = ?, telefone = ?, whatsapp = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssssssi", $this->nome, $this->endereco, $this->ramo_atuacao, $this->telefone, $this->whatsapp, $this->email, $this->id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    public static function excluir($id) {
        $conn = self::conectar();
        $stmt = $conn->prepare("DELETE FROM fornecedores WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
}
?>
