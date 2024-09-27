<?php
include_once '../app/models/Cardapio.php';

class CardapioController {
    public static function listar() {
        $cardapios = Cardapio::listar();
        include 'views/nutricionista/listar_cardapios.php'; // Inclui a view para listar
    }

    public static function cadastrar($dados) {
        $cardapio = new Cardapio();
        $cardapio->setNomePrato($dados['nome_prato']);
        $cardapio->setIngredientes($dados['ingredientes']);
        $cardapio->setValorNutricional($dados['valor_nutricional']);
        $cardapio->setDataValidade($dados['data_validade']);
        
        if ($cardapio->cadastrar()) {
            header("Location: index.php?action=listar_cardapios&msg=Cardápio cadastrado com sucesso!");
        } else {
            header("Location: index.php?action=cadastrar_cardapio&msg=Erro ao cadastrar cardápio.");
        }
    }

    public static function editar($id, $dados) {
        $cardapio = Cardapio::buscarPorId($id);
        if ($cardapio) {
            $cardapio->setNomePrato($dados['nome_prato']);
            $cardapio->setIngredientes($dados['ingredientes']);
            $cardapio->setValorNutricional($dados['valor_nutricional']);
            $cardapio->setDataValidade($dados['data_validade']);
            if ($cardapio->atualizar()) {
                header("Location: index.php?action=listar_cardapios&msg=Cardápio atualizado com sucesso!");
            } else {
                header("Location: index.php?action=editar_cardapio&id=$id&msg=Erro ao atualizar cardápio.");
            }
        } else {
            header("Location: index.php?action=listar_cardapios&msg=Cardápio não encontrado.");
        }
    }

    public static function excluir($id) {
        if (Cardapio::excluir($id)) {
            header("Location: index.php?action=listar_cardapios&msg=Cardápio excluído com sucesso!");
        } else {
            header("Location: index.php?action=listar_cardapios&msg=Erro ao excluir cardápio.");
        }
    }

    public static function buscar($id) {
        return Cardapio::buscarPorId($id);
    }
}
?>
