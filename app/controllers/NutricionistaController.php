<?php
require_once '../app/models/Nutricionista.php';

class NutricionistaController {
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

            $nutricionista = Nutricionista::buscarPorEmail($email);

            if ($nutricionista && password_verify($senha, $nutricionista['senha'])) {
                session_start();
                $_SESSION['usuario'] = $nutricionista;
                header('Location: dashboard.php');
                exit();
            } else {
                echo "Credenciais inválidas!";
                include '../app/views/pages/nutricionista_login.php';
            }
        } else {
            include '../app/views/pages/nutricionista_login.php';
        }
    }

    private function cadastrar() {
        $nutricionista = new Nutricionista();
        $nutricionista->setCpf($_POST['cpf']);
        $nutricionista->setNome($_POST['nome']);
        $nutricionista->setSobrenome($_POST['sobrenome']);
        $nutricionista->setDataNascimento($_POST['data_nascimento']);
        $nutricionista->setEndereco($_POST['endereco']);
        $nutricionista->setTelefone($_POST['telefone']);
        $nutricionista->setEmail($_POST['email']);
        $nutricionista->setSenha($_POST['senha']);

        if ($nutricionista->cadastrar()) {
            header('Location: nutricionista_view.php?msg=Cadastro realizado com sucesso!');
        } else {
            header('Location: nutricionista_view.php?msg=Erro no cadastro.');
        }
    }

    private function listar() {
        // Lógica para listar nutricionistas se necessário
        include '../app/views/nutricionista/nutricionista_view.php';
    }
}

// Executa o controlador
$controller = new NutricionistaController();
$controller->handleRequest();
?>
