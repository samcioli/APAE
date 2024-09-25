<?php
class Admin {
    private $id;
    private $cpf;
    private $nome;
    private $sobrenome;
    private $dataNascimento;
    private $endereco;
    private $telefone;
    private $email;
    private $senha;

    // Construtor
    public function __construct($id = null) {
        if ($id) {
            $this->carregar($id);
        }
    }

    private function carregar($id) {
        // Lógica para buscar o admin pelo ID do banco de dados
        $db = new PDO('mysql:host=localhost;dbname=apae_db', 'username', 'password');
        $stmt = $db->prepare("SELECT * FROM administradores WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($data) {
            $this->id = $data['id'];
            $this->cpf = $data['cpf'];
            $this->nome = $data['nome'];
            $this->sobrenome = $data['sobrenome'];
            $this->dataNascimento = $data['data_nascimento'];
            $this->endereco = $data['endereco'];
            $this->telefone = $data['telefone'];
            $this->email = $data['email'];
            $this->senha = $data['senha'];
        }
    }

    // Getters e Setters
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }
    public function getCpf() { return $this->cpf; }
    public function setCpf($cpf) { $this->cpf = $cpf; }
    public function getNome() { return $this->nome; }
    public function setNome($nome) { $this->nome = $nome; }
    public function getSobrenome() { return $this->sobrenome; }
    public function setSobrenome($sobrenome) { $this->sobrenome = $sobrenome; }
    public function getDataNascimento() { return $this->dataNascimento; }
    public function setDataNascimento($dataNascimento) { $this->dataNascimento = $dataNascimento; }
    public function getEndereco() { return $this->endereco; }
    public function setEndereco($endereco) { $this->endereco = $endereco; }
    public function getTelefone() { return $this->telefone; }
    public function setTelefone($telefone) { $this->telefone = $telefone; }
    public function getEmail() { return $this->email; }
    public function setEmail($email) { $this->email = $email; }
    public function getSenha() { return $this->senha; }
    public function setSenha($senha) { $this->senha = password_hash($senha, PASSWORD_DEFAULT); }

    // Métodos para CRUD
    public static function listar() {
        $db = new PDO('mysql:host=localhost;dbname=apae_db', 'username', 'password');
        $stmt = $db->query("SELECT * FROM administradores");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function salvar() {
        $db = new PDO('mysql:host=localhost;dbname=apae_db', 'username', 'password');
        $stmt = $db->prepare("INSERT INTO administradores (cpf, nome, sobrenome, data_nascimento, endereco, telefone, email, senha) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$this->cpf, $this->nome, $this->sobrenome, $this->dataNascimento, $this->endereco, $this->telefone, $this->email, $this->senha]);
    }

    public function atualizar() {
        $db = new PDO('mysql:host=localhost;dbname=apae_db', 'username', 'password');
        $stmt = $db->prepare("UPDATE administradores SET cpf = ?, nome = ?, sobrenome = ?, data_nascimento = ?, endereco = ?, telefone = ?, email = ? WHERE id = ?");
        return $stmt->execute([$this->cpf, $this->nome, $this->sobrenome, $this->dataNascimento, $this->endereco, $this->telefone, $this->email, $this->id]);
    }

    public static function excluir($id) {
        $db = new PDO('mysql:host=localhost;dbname=apae_db', 'username', 'password');
        $stmt = $db->prepare("DELETE FROM administradores WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function buscar($id) {
        $db = new PDO('mysql:host=localhost;dbname=apae_db', 'username', 'password');
        $stmt = $db->prepare("SELECT * FROM administradores WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
