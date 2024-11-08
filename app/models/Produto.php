<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/APAE/database/config.php');

class Produto {
    private $id;
    private $nome;
    private $categoria;
    private $medida;

    // Getters e Setters
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }
    public function getNome() { return $this->nome; }
    public function setNome($nome) { $this->nome = $nome; }
    public function getCategoria() { return $this->categoria; }
    public function setCategoria($categoria) { $this->categoria = $categoria; }
    public function getMedida() { return $this->medida; }
    public function setMedida($medida) { $this->medida = $medida; }

    public function cadastrar() {
        $conn = self::conectar();
        $stmt = $conn->prepare("INSERT INTO produtos (nome, categoria, medida) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $this->nome, $this->categoria, $this->medida);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    public static function listar() {
        $conn = self::conectar();
        $result = $conn->query("SELECT * FROM produtos");
        $produtos = $result->fetch_all(MYSQLI_ASSOC);
        $conn->close();
        return $produtos;
    }

    public static function buscarPorId($id) {
        $conn = self::conectar();
        $stmt = $conn->prepare("SELECT * FROM produtos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $produto = $result->fetch_object();
        $stmt->close();
        $conn->close();
        return $produto;
    }

    public function atualizar() {
        $conn = self::conectar();
        $stmt = $conn->prepare("UPDATE produtos SET nome = ?, categoria = ?, medida = ? WHERE id = ?");
        $stmt->bind_param("sssi", $this->nome, $this->categoria, $this->medida, $this->id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    public static function excluir($id) {
        $conn = self::conectar();
        $stmt = $conn->prepare("DELETE FROM produtos WHERE id = ?");
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
