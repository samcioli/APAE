<?php
require_once 'config.php';

class Cotacao {
    private $nome_produto;
    private $nome_fornecedor;
    private $preco_unitario;
    private $quantidade;
    private $data_cotacao;
    private $categoria;
    private $unidade;

    public function __construct($dados = []) {
        if (!empty($dados)) {
            $this->nome_produto = $dados['nome_produto'];
            $this->nome_fornecedor = $dados['nome_fornecedor'];
            $this->preco_unitario = $dados['preco_unitario'];
            $this->quantidade = $dados['quantidade'];
            $this->data_cotacao = $dados['data_cotacao'];
            $this->categoria = $dados['categoria'];
            // Certifique-se de que "unidade" está definido
            $this->unidade = $dados['unidade'] ?? null; // Usa null se a chave não existir
        }
    }

    public function salvar() {
        try {
            $db = new PDO('mysql:host=localhost;dbname=apae_db', 'root', '');
            $stmt = $db->prepare("INSERT INTO cotacoes (nome_produto, nome_fornecedor, preco_unitario, quantidade, data_cotacao, categoria, unidade) VALUES (?, ?, ?, ?, ?, ?, ?)");
            return $stmt->execute([$this->nome_produto, $this->nome_fornecedor, $this->preco_unitario, $this->quantidade, $this->data_cotacao, $this->categoria, $this->unidade]);
        } catch (PDOException $e) {
            return false;
        }
    }
}

?>
