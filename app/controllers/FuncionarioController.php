<?php
require_once '../app/models/Funcionario.php';

class FuncionarioController {
    public function handleRequest() {
        $action = $_GET['action'] ?? null;

        switch ($action) {
            case 'login':
                $this->login();
                break;
            case 'cadastrar':
                $this->cadastrar();
                break;
            default:
                $this->listar();
                break;
        }
    }

    private function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $funcionario = Funcionario::buscarPorEmail($email);

            if ($funcionario && password_verify($senha, $funcionario['senha'])) {
                session_start();
                $_SESSION['usuario'] = $funcionario;
                header('Location: dashboard.php');
                exit();
            } else {
                echo "Credenciais inválidas!";
                include '../app/views/pages/funcionario_login.php';
            }
        } else {
            include '../app/views/pages/funcionario_login.php';
        }
    }

    private function cadastrar() {
        $funcionario = new Funcionario();
        $funcionario->setCpf($_POST['cpf']);
        $funcionario->setNome($_POST['nome']);
        $funcionario->setSobrenome($_POST['sobrenome']);
        $funcionario->setDataNascimento($_POST['data_nascimento']);
        $funcionario->setEndereco($_POST['endereco']);
        $funcionario->setTelefone($_POST['telefone']);
        $funcionario->setEmail($_POST['email']);
        $funcionario->setSenha($_POST['senha']);

        if ($funcionario->cadastrar()) {
            header('Location: funcionario_view.php?msg=Cadastro realizado com sucesso!');
        } else {
            header('Location: funcionario_view.php?msg=Erro no cadastro.');
        }
    }

    private function listar() {
        $funcionarios = Funcionario::listar(); // Método que busca todos os funcionários
        include '../app/views/funcionario/funcionario_view.php';
    }
    
}

// Executa o controlador
$controller = new FuncionarioController();
$controller->handleRequest();
?>
