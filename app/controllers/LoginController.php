<?php
require_once '../app/models/Funcionario.php'; // Inclua os modelos necessários

class LoginController {
    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $role = $_POST['role'];

            // Aqui você deve implementar a lógica de autenticação
            if ($this->login($email, $senha, $role)) {
                header("Location: dashboard.php"); // Redireciona para o dashboard
                exit();
            } else {
                echo "Credenciais inválidas!";
            }
        }
    }

    private function login($email, $senha, $role) {
        // Adicione a lógica de autenticação de acordo com a função
        // Exemplo simples:
        $funcionario = Funcionario::buscarPorEmail($email); // Você deve implementar esse método

        if ($funcionario && password_verify($senha, $funcionario->getSenha())) {
            // Salve a informação do usuário na sessão
            $_SESSION['user_id'] = $funcionario->getId();
            return true;
        }

        return false;
    }
}
?>
