<?php

require_once '../app/models/Login.php'; // Inclua o modelo de login

class LoginController {
    private $login;

    public function __construct() {
        $this->login = new Login(); // Inicializa o modelo de login
    }

public function handleRequest() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $role = $_POST['role'];

        // Chama a lógica de autenticação
        if ($this->login($email, $senha, $role)) {
            header("Location: home.php"); // Redireciona para o home
            exit();
        } else {
            return "Credenciais inválidas!"; // Mensagem de erro
        }
    }
    return null; // Sem erro se não for POST
}


    private function login($email, $senha, $role) {
        switch ($role) {
            case 'admin':
                return $this->loginAdmin($email, $senha);
            case 'funcionario':
                return $this->loginFuncionario($email, $senha);
            case 'nutricionista':
                return $this->loginNutricionista($email, $senha);
            default:
                return false; // Função não reconhecida
        }
    }

    private function loginAdmin($email, $senha) {
        $admin = $this->login->buscarPorEmail($email);
        if ($admin && $this->login->verificarSenha($senha, $admin->senha)) {
            $_SESSION['user_id'] = $admin->id; // Use o nome correto da coluna do ID
            return true;
        }
        return false;
    }

    private function loginFuncionario($email, $senha) {
        $funcionario = $this->login->buscarPorEmail($email);
        if ($funcionario && $this->login->verificarSenha($senha, $funcionario->senha)) {
            $_SESSION['user_id'] = $funcionario->id; // Use o nome correto da coluna do ID
            return true;
        }
        return false;
    }

    private function loginNutricionista($email, $senha) {
        $nutricionista = $this->login->buscarPorEmail($email);
        if ($nutricionista && $this->login->verificarSenha($senha, $nutricionista->senha)) {
            $_SESSION['user_id'] = $nutricionista->id; // Use o nome correto da coluna do ID
            return true;
        }
        return false;
    }
}

// Processa a requisição
$controller = new LoginController();
$erro = $controller->handleRequest();
if ($erro) {
    // Exiba a mensagem de erro
    echo "<script>alert('$erro');</script>"; // Alerta em caso de erro, ajuste conforme necessário
}
?>
