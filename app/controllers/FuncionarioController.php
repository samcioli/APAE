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

            case 'excluir':
                $this->excluir();
                break;

            case 'editar':
                $this->editar();
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

            $funcionario = Funcionario::findByEmail($email);

            if ($funcionario && password_verify($senha, $funcionario['senha'])) {
                // Inicie a sessão e redirecione para a dashboard
                session_start();
                $_SESSION['usuario'] = $funcionario; // Armazena as informações do funcionário
                header('Location: dashboard.php'); // Redireciona para a página inicial
                exit();
            } else {
                echo "Credenciais inválidas!";
                include '../app/views/pages/login.php'; // Reexibe a tela de login
            }
        } else {
            include '../app/views/pages/login.php'; // Exibe a tela de login
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
        $funcionario->setSenha(password_hash($_POST['senha'], PASSWORD_DEFAULT)); // Hash da senha

        if ($funcionario->cadastrar()) {
            header('Location: funcionario_view.php?msg=Cadastro realizado com sucesso!');
        } else {
            header('Location: funcionario_view.php?msg=Erro no cadastro.');
        }
    }

    private function excluir() {
        $id = $_GET['id'];
        Funcionario::excluir($id);
        header('Location: funcionario_view.php?msg=Funcionário excluído com sucesso!');
    }

    private function editar() {
        $id = $_GET['id'];
        $funcionario = Funcionario::buscarPorId($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Atualiza os dados
            $funcionario->setCpf($_POST['cpf']);
            $funcionario->setNome($_POST['nome']);
            $funcionario->setSobrenome($_POST['sobrenome']);
            $funcionario->setDataNascimento($_POST['data_nascimento']);
            $funcionario->setEndereco($_POST['endereco']);
            $funcionario->setTelefone($_POST['telefone']);
            $funcionario->setEmail($_POST['email']);
            $funcionario->setSenha(password_hash($_POST['senha'], PASSWORD_DEFAULT)); // Hash da senha

            $funcionario->atualizar();
            header('Location: funcionario_view.php?msg=Funcionário atualizado com sucesso!');
        } else {
            include 'funcionario_form.php'; // Inclui o formulário de edição
        }
    }

    private function listar() {
        $funcionarios = Funcionario::listar();
        include '../app/views/funcionario/funcionario_view.php'; // Inclui a view de listagem
    }
}

// Executa o controlador
$controller = new FuncionarioController();
$controller->handleRequest();
?>
