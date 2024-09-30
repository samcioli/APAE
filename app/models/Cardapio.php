<?php

require_once 'config.php';

class Cardapio {
    private $id;
    private $nome_prato;
    private $ingredientes;
    private $valor_nutricional;
    private $data_validade;

    // Getters e Setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNomePrato() {
        return $this->nome_prato;
    }

    public function setNomePrato($nome_prato) {
        $this->nome_prato = $nome_prato;
    }

    public function getIngredientes() {
        return $this->ingredientes;
    }

    public function setIngredientes($ingredientes) {
        $this->ingredientes = $ingredientes;
    }

    public function getValorNutricional() {
        return $this->valor_nutricional;
    }

    public function setValorNutricional($valor_nutricional) {
        $this->valor_nutricional = $valor_nutricional;
    }

    public function getDataValidade() {
        return $this->data_validade;
    }

    public function setDataValidade($data_validade) {
        $this->data_validade = $data_validade;
    }

    public function cadastrar() {
        $conn = $this->conectar();
        $stmt = $conn->prepare("INSERT INTO cardapios (nome_prato, ingredientes, valor_nutricional, data_validade) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $this->nome_prato, $this->ingredientes, $this->valor_nutricional, $this->data_validade);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    public static function listar() {
        $conn = self::conectar();
        $result = $conn->query("SELECT * FROM cardapios");
        $cardapios = $result->fetch_all(MYSQLI_ASSOC);
        $conn->close();
        return $cardapios;
    }

    public static function buscarPorId($id) {
        $conn = self::conectar();
        $stmt = $conn->prepare("SELECT * FROM cardapios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $cardapio = $result->fetch_object();
        $stmt->close();
        $conn->close();
        return $cardapio;
    }

    public function atualizar() {
        $conn = $this->conectar();
        $stmt = $conn->prepare("UPDATE cardapios SET nome_prato = ?, ingredientes = ?, valor_nutricional = ?, data_validade = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $this->nome_prato, $this->ingredientes, $this->valor_nutricional, $this->data_validade, $this->id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    public static function excluir($id) {
        $conn = self::conectar();
        $stmt = $conn->prepare("DELETE FROM cardapios WHERE id = ?");
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
