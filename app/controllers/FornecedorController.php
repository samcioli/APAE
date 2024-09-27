<?php
include_once '../app/models/Fornecedor.php';

class FornecedorController {
    public static function cadastrar($dados) {
        $fornecedor = new Fornecedor();
        $fornecedor->setNome($dados['nome']);
        $fornecedor->setEndereco($dados['endereco']);
        $fornecedor->setRamoAtuacao($dados['ramo_atuacao']);
        $fornecedor->setTelefone($dados['telefone']);
        $fornecedor->setWhatsapp($dados['whatsapp']);
        $fornecedor->setEmail($dados['email']);
        $fornecedor->cadastrar();
    }

    public static function listar() {
        return Fornecedor::listar();
    }

    public static function buscar($id) {
        return Fornecedor::buscarPorId($id);
    }

    public static function editar($id, $dados) {
        $fornecedor = new Fornecedor();
        $fornecedor->setId($id);
        $fornecedor->setNome($dados['nome']);
        $fornecedor->setEndereco($dados['endereco']);
        $fornecedor->setRamoAtuacao($dados['ramo_atuacao']);
        $fornecedor->setTelefone($dados['telefone']);
        $fornecedor->setWhatsapp($dados['whatsapp']);
        $fornecedor->setEmail($dados['email']);
        $fornecedor->atualizar();
    }

    public static function excluir($id) {
        Fornecedor::excluir($id);
    }
}
?>
