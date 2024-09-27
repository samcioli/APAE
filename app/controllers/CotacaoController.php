<?php
include_once '../app/models/Cotacao.php';

class CotacaoController {
    public static function cadastrar($dados) {
        $cotacao = new Cotacao();
        $cotacao->setProdutoId($dados['produto_id']);
        $cotacao->setFornecedorId($dados['fornecedor_id']);
        $cotacao->setPrecoUnitario($dados['preco_unitario']);
        $cotacao->setQuantidade($dados['quantidade']);
        $cotacao->setDataCotacao(date('Y-m-d')); // Data da cotação
        $cotacao->cadastrar();
    }

    public static function listar() {
        return Cotacao::listar();
    }

    public static function buscar($id) {
        return Cotacao::buscarPorId($id);
    }

    public static function editar($id, $dados) {
        $cotacao = new Cotacao();
        $cotacao->setId($id);
        $cotacao->setProdutoId($dados['produto_id']);
        $cotacao->setFornecedorId($dados['fornecedor_id']);
        $cotacao->setPrecoUnitario($dados['preco_unitario']);
        $cotacao->setQuantidade($dados['quantidade']);
        $cotacao->setDataCotacao($dados['data_cotacao']);
        $cotacao->atualizar();
    }

    public static function excluir($id) {
        Cotacao::excluir($id);
    }
}
?>
