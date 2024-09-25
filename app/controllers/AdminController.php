<?php
include_once 'models/Admin.php';

class AdminController {
    public static function listar() {
        return Admin::listar();
    }

    public static function cadastrar($dados) {
        $admin = new Admin();
        $admin->setCpf($dados['cpf']);
        $admin->setNome($dados['nome']);
        $admin->setSobrenome($dados['sobrenome']);
        $admin->setDataNascimento($dados['data_nascimento']);
        $admin->setEndereco($dados['endereco']);
        $admin->setTelefone($dados['telefone']);
        $admin->setEmail($dados['email']);
        $admin->setSenha($dados['senha']);
        return $admin->salvar();
    }

    public static function editar($id, $dados) {
        $admin = new Admin($id);
        $admin->setCpf($dados['cpf']);
        $admin->setNome($dados['nome']);
        $admin->setSobrenome($dados['sobrenome']);
        $admin->setDataNascimento($dados['data_nascimento']);
        $admin->setEndereco($dados['endereco']);
        $admin->setTelefone($dados['telefone']);
        $admin->setEmail($dados['email']);
        return $admin->atualizar();
    }

    public static function excluir($id) {
        return Admin::excluir($id);
    }

    public static function buscar($id) {
        return Admin::buscar($id);
    }
}
?>
