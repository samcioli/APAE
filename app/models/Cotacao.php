<?php
require_once 'config.php';

class Cotacao {
    private $id;
    private $nome_produto;
    private $nome_fornecedor;
    private $preco_unitario;
    private $quantidade;
    private $data_cotacao;
    private $categoria;
    private $unidade;

    // Construtor com os dados passados
    public function __construct($dados = []) {
        if (!empty($dados)) {
            $this->id = $dados['id'] ?? null;  // Atribui o ID, se presente
            $this->nome_produto = $dados['nome_produto'] ?? null;
            $this->nome_fornecedor = $dados['nome_fornecedor'] ?? null;
            $this->preco_unitario = $dados['preco_unitario'] ?? null;
            $this->quantidade = $dados['quantidade'] ?? null;
            $this->data_cotacao = $dados['data_cotacao'] ?? null;
            $this->categoria = $dados['categoria'] ?? null;
            $this->unidade = $dados['unidade'] ?? null; // Unidade pode ser nula
        }
    }

    // Método para definir o ID, caso necessário
    public function setId($id) {
        $this->id = $id;
    }

    // Método para salvar uma nova cotação no banco de dados
    public function salvar() {
        try {
            $db = new PDO('mysql:host=localhost;dbname=apae_db', 'root', '');
            $stmt = $db->prepare("INSERT INTO cotacoes (nome_produto, nome_fornecedor, preco_unitario, quantidade, data_cotacao, categoria, unidade) 
                                  VALUES (?, ?, ?, ?, ?, ?, ?)");
            return $stmt->execute([
                $this->nome_produto,
                $this->nome_fornecedor,
                $this->preco_unitario,
                $this->quantidade,
                $this->data_cotacao,
                $this->categoria,
                $this->unidade
            ]);
        } catch (PDOException $e) {
            return false; // Retorna falso se houver erro
        }
    }

    // Método para atualizar os dados da cotação no banco de dados
    public function atualizar() {
        try {
            // Conexão com o banco de dados
            $db = new PDO('mysql:host=localhost;dbname=apae_db', 'root', '');

            // Prepara a consulta SQL de atualização
            $stmt = $db->prepare("UPDATE cotacoes 
                                  SET nome_produto = ?, nome_fornecedor = ?, preco_unitario = ?, quantidade = ?, data_cotacao = ?, categoria = ?, unidade = ?
                                  WHERE id = ?");
            
            // Executa a consulta de atualização
            return $stmt->execute([
                $this->nome_produto,
                $this->nome_fornecedor,
                $this->preco_unitario,
                $this->quantidade,
                $this->data_cotacao,
                $this->categoria,
                $this->unidade,
                $this->id
            ]);
        } catch (PDOException $e) {
            return false; // Retorna falso em caso de erro
        }
    }

    // Método para buscar uma cotação pelo ID
    public static function buscarPorId($id) {
        try {
            $db = new PDO('mysql:host=localhost;dbname=apae_db', 'root', '');
            $stmt = $db->prepare("SELECT * FROM cotacoes WHERE id = ?");
            $stmt->execute([$id]);
            $cotacao = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($cotacao) {
                return new Cotacao($cotacao); // Retorna uma instância de Cotacao com os dados encontrados
            } else {
                return null; // Retorna null se não encontrar
            }
        } catch (PDOException $e) {
            return null; // Retorna null em caso de erro
        }
    }

    // Getters e setters para os atributos
    public function getId() {
        return $this->id;
    }

    public function getNomeProduto() {
        return $this->nome_produto;
    }

    public function setNomeProduto($nome_produto) {
        $this->nome_produto = $nome_produto;
    }

    public function getNomeFornecedor() {
        return $this->nome_fornecedor;
    }

    public function setNomeFornecedor($nome_fornecedor) {
        $this->nome_fornecedor = $nome_fornecedor;
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

    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function getUnidade() {
        return $this->unidade;
    }

    public function setUnidade($unidade) {
        $this->unidade = $unidade;
    }
}
