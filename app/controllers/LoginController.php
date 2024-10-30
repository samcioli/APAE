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
                header("Location: public/home.php"); // Redireciona para o home
                exit();
            } else {
                return "Credenciais inválidas!"; // Mensagem de erro
            }
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once '../app/controllers/LoginController.php';
            $loginController = new LoginController();
            $erro = $loginController->handleRequest();
        }        
        return null; // Sem erro
    }

    private function login($email, $senha, $role) {
        switch ($role) {
            case 'admin':
                if ($this->loginAdmin($email, $senha)) {
                    error_log("Login bem-sucedido para Admin: $email");
                    return true;
                }
                break;
            case 'funcionario':
                if ($this->loginFuncionario($email, $senha)) {
                    error_log("Login bem-sucedido para Funcionário: $email");
                    return true;
                }
                break;
            case 'nutricionista':
                if ($this->loginNutricionista($email, $senha)) {
                    error_log("Login bem-sucedido para Nutricionista: $email");
                    return true;
                }
                break;
            default:
                error_log("Função não reconhecida: $role");
                return false;
        }
        return false; // Se chegar aqui, o login falhou
    }
    

    private function loginAdmin($email, $senha) {
        // Lógica para autenticar o admin
        $admin = $this->login->buscarPorEmail($email);

        if ($admin && $this->login->verificarSenha($senha, $admin->senha)) { // Use o nome correto da coluna da senha
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
header("Location: http://localhost/apae/public/home.php");
exit();

?>
