<?php
require_once 'Funcionario.php';

class FuncionarioController {

    public function handleRequest() {
        $action = $_GET['action'] ?? null;

        switch ($action) {
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
        include 'funcionario_view.php'; // Inclui a view de listagem
    }
}

// Executa o controlador
$controller = new FuncionarioController();
$controller->handleRequest();
?>
