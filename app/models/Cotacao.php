<?php

require_once 'config.php';

class Cotacao {
    private $id;
    private $produto_id;
    private $fornecedor_id;
    private $preco_unitario;
    private $quantidade;
    private $data_cotacao;

    // Getters e Setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getProdutoId() {
        return $this->produto_id;
    }

    public function setProdutoId($produto_id) {
        $this->produto_id = $produto_id;
    }

    public function getFornecedorId() {
        return $this->fornecedor_id;
    }

    public function setFornecedorId($fornecedor_id) {
        $this->fornecedor_id = $fornecedor_id;
    }

    public function getPrecoUnitario() {
        return $this->preco_unitario;
    }

    public function setPrecoUnitario($preco_unitario) {
        $this->preco_unitario = $preco_unitario;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function getDataCotacao() {
        return $this->data_cotacao;
    }

    public function setDataCotacao($data_cotacao) {
        $this->data_cotacao = $data_cotacao;
    }

    // Métodos para interagir com o banco de dados
    private static function conectar() {
        return new mysqli("localhost", "usuario", "senha", "database");
    }

    public function cadastrar() {
        $conn = self::conectar();
        $stmt = $conn->prepare("INSERT INTO cotacoes (produto_id, fornecedor_id, preco_unitario, quantidade, data_cotacao) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iidsi", $this->produto_id, $this->fornecedor_id, $this->preco_unitario, $this->quantidade, $this->data_cotacao);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    public static function listar() {
        $conn = self::conectar();
        $result = $conn->query("SELECT * FROM cotacoes");
        $cotacoes = $result->fetch_all(MYSQLI_ASSOC);
        $conn->close();
        return $cotacoes;
    }

    public static function buscarPorId($id) {
        $conn = self::conectar();
        $stmt = $conn->prepare("SELECT * FROM cotacoes WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $cotacao = $result->fetch_object();
        $stmt->close();
        $conn->close();
        return $cotacao;
    }

    public function atualizar() {
        $conn = self::conectar();
        $stmt = $conn->prepare("UPDATE cotacoes SET produto_id = ?, fornecedor_id = ?, preco_unitario = ?, quantidade = ?, data_cotacao = ? WHERE id = ?");
        $stmt->bind_param("iidsii", $this->produto_id, $this->fornecedor_id, $this->preco_unitario, $this->quantidade, $this->data_cotacao, $this->id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    public static function excluir($id) {
        $conn = self::conectar();
        $stmt = $conn->prepare("DELETE FROM cotacoes WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
}
?>
