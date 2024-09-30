<?php
require_once '../model/Cadastro.php';
require_once '../model/Funcionario.php';
require_once '../model/Nutricionista.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dados = [
        'cpf' => $_POST['cpf'],
        'nome' => $_POST['nome'],
        'sobrenome' => $_POST['sobrenome'],
        'data_nascimento' => $_POST['data_nascimento'],
        'endereco' => $_POST['endereco'],
        'telefone' => $_POST['telefone'],
        'email' => $_POST['email'],
        'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT), // Criptografar senha
        'role' => $_POST['role']
    ];

    if ($dados['role'] == 'admin') {
        $cadastro = new Cadastro($dados);
        if ($cadastro->salvar()) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar. Tente novamente.";
        }
    } elseif ($dados['role'] == 'funcionario') {
        $funcionario = new Funcionario($dados);
        if ($funcionario->salvar()) {
            echo "Cadastro de funcionário realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar funcionário. Tente novamente.";
        }
    } elseif ($dados['role'] == 'nutricionista') {
        $nutricionista = new Nutricionista($dados);
        if ($nutricionista->salvar()) {
            echo "Cadastro de nutricionista realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar nutricionista. Tente novamente.";
        }
    } else {
        echo "Função inválida selecionada.";
    }
}
?>
