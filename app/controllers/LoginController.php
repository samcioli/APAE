<?php
session_start(); // Certifique-se de que a sessão esteja iniciada
require_once '../app/models/LoginModel.php'; // Inclua o modelo de login

class LoginController {
    private $loginModel;

    public function __construct() {
        $this->loginModel = new LoginModel(); // Inicializa o modelo de login
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
        return null; // Sem erro
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
                return false; // Role não reconhecida
        }
    }

    private function loginAdmin($email, $senha) {
        // Lógica para autenticar o admin
        $admin = $this->loginModel->buscarPorEmail($email);

        if ($admin && $this->loginModel->verificarSenha($senha, $admin->senha)) { // Use o nome correto da coluna da senha
            $_SESSION['user_id'] = $admin->id; // Use o nome correto da coluna do ID
            return true;
        }

        return false;
    }

    private function loginFuncionario($email, $senha) {
        $funcionario = $this->loginModel->buscarPorEmail($email);

        if ($funcionario && $this->loginModel->verificarSenha($senha, $funcionario->senha)) {
            $_SESSION['user_id'] = $funcionario->id; // Use o nome correto da coluna do ID
            return true;
        }

        return false;
    }

    private function loginNutricionista($email, $senha) {
        $nutricionista = $this->loginModel->buscarPorEmail($email);

        if ($nutricionista && $this->loginModel->verificarSenha($senha, $nutricionista->senha)) {
            $_SESSION['user_id'] = $nutricionista->id; // Use o nome correto da coluna do ID
            return true;
        }

        return false;
    }
}
?>
