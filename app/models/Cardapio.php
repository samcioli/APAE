<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/APAE/database/config.php');

class Cardapio {
    private $id;
    private $nome_prato;
    private $ingredientes;
    private $valor_nutricional;
    private $data_validade;

    // Construtor com os dados passados
    public function __construct($dados = []) {
        if (!empty($dados)) {
            $this->id = $dados['id'] ?? null;  // Atribui o ID, se presente
            $this->nome_prato = $dados['nome_prato'] ?? null;
            $this->ingredientes = $dados['ingredientes'] ?? null;
            $this->valor_nutricional = $dados['valor_nutricional'] ?? null;
            $this->data_validade = $dados['data_validade'] ?? null;
        }
    }

    // Método para definir o ID, caso necessário
    public function setId($id) {
        $this->id = $id;
    }

    // Método para salvar um novo cardápio no banco de dados
    public function salvar() {
        try {
            $db = new PDO('mysql:host=localhost;dbname=apae_db', 'root', '');
            $stmt = $db->prepare("INSERT INTO cardapios (nome_prato, ingredientes, valor_nutricional, data_validade) 
                                  VALUES (?, ?, ?, ?)");
            return $stmt->execute([
                $this->nome_prato,
                $this->ingredientes,
                $this->valor_nutricional,
                $this->data_validade
            ]);
        } catch (PDOException $e) {
            return false; // Retorna falso se houver erro
        }
    }

    // Método para atualizar os dados do cardápio no banco de dados
    public function atualizar() {
        try {
            // Conexão com o banco de dados
            $db = new PDO('mysql:host=localhost;dbname=apae_db', 'root', '');

            // Prepara a consulta SQL de atualização
            $stmt = $db->prepare("UPDATE cardapios 
                                  SET nome_prato = ?, ingredientes = ?, valor_nutricional = ?, data_validade = ?
                                  WHERE id = ?");
            
            // Executa a consulta de atualização
            return $stmt->execute([
                $this->nome_prato,
                $this->ingredientes,
                $this->valor_nutricional,
                $this->data_validade,
                $this->id
            ]);
        } catch (PDOException $e) {
            return false; // Retorna falso em caso de erro
        }
    }

    // Método para buscar um cardápio pelo ID
    public static function buscarPorId($id) {
        try {
            $db = new PDO('mysql:host=localhost;dbname=apae_db', 'root', '');
            $stmt = $db->prepare("SELECT * FROM cardapios WHERE id = ?");
            $stmt->execute([$id]);
            $cardapio = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($cardapio) {
                return new Cardapio($cardapio); // Retorna uma instância de Cardapio com os dados encontrados
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
}
?>
