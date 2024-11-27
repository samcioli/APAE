<?php
class Relatorio {

    private $conn;
    private $table = "relatorios"; // Nome da tabela no banco

    // Atributos do relatório
    private $id;
    private $titulo;
    private $descricao;
    private $data_emissao;
    private $autor;

    // Construtor para inicializar a conexão
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Métodos para setar os atributos
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setDataEmissao($data_emissao) {
        $this->data_emissao = $data_emissao;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    // Método para cadastrar um relatório
    public function cadastrar() {
        $query = "INSERT INTO " . $this->table . " (titulo, descricao, data_emissao, autor) 
                  VALUES (:titulo, :descricao, :data_emissao, :autor)";
        
        $stmt = $this->conn->prepare($query);
        
        // Bind dos parâmetros
        $stmt->bindParam(":titulo", $this->titulo);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":data_emissao", $this->data_emissao);
        $stmt->bindParam(":autor", $this->autor);

        // Executar a consulta
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método para listar todos os relatórios
    public function listarTodos() {
        $query = "SELECT * FROM " . $this->table;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
