<?php
class Fornecedor {

    private $id;
    private $nome;
    private $endereco;
    private $ramo;
    private $telefone;
    private $whatsapp;
    private $email;

    private $conn;
    private $table_name = "fornecedores";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Métodos set (para atribuir valores às propriedades)
    public function setNome($nome) {
        $this->nome = htmlspecialchars(strip_tags($nome));
    }

    public function setEndereco($endereco) {
        $this->endereco = htmlspecialchars(strip_tags($endereco));
    }

    public function setRamo($ramo) {
        $this->ramo = htmlspecialchars(strip_tags($ramo));
    }

    public function setTelefone($telefone) {
        $this->telefone = htmlspecialchars(strip_tags($telefone));
    }

    public function setWhatsapp($whatsapp) {
        $this->whatsapp = htmlspecialchars(strip_tags($whatsapp));
    }

    public function setEmail($email) {
        $this->email = htmlspecialchars(strip_tags($email));
    }

    // Função para cadastrar fornecedor no banco de dados
    public function cadastrar() {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET nome = :nome, 
                      endereco = :endereco,
                      ramo = :ramo,
                      telefone = :telefone,
                      whatsapp = :whatsapp,
                      email = :email";

        $stmt = $this->conn->prepare($query);

        // Bind dos parâmetros
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":endereco", $this->endereco);
        $stmt->bindParam(":ramo", $this->ramo);
        $stmt->bindParam(":telefone", $this->telefone);
        $stmt->bindParam(":whatsapp", $this->whatsapp);
        $stmt->bindParam(":email", $this->email);

        // Executa a query e verifica se foi bem-sucedido
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

}
?>
