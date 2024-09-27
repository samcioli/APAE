<?php
require_once '../app/models/Produto.php';

class ProdutoController {
    public function cadastrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $produto = new Produto();
            $produto->setNome($_POST['nome']);
            $produto->setCategoria($_POST['categoria']);
            $produto->setMedida($_POST['medida']);
            $produto->cadastrar();
            header("Location: ProdutoController.php?action=gerenciar&msg=Produto cadastrado com sucesso!");
            exit();
        }
        include '../views/produto/cadastro.php';
    }

    public function gerenciar() {
        $produtos = Produto::listar();
        include '../views/produto/gerenciar.php';
    }

    public function excluir($id) {
        Produto::excluir($id);
        header("Location: ProdutoController.php?action=gerenciar&msg=Produto excluído com sucesso!");
        exit();
    }

    public function editar($id) {
        $produto = Produto::buscarPorId($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $produto->setNome($_POST['nome']);
            $produto->setCategoria($_POST['categoria']);
            $produto->setMedida($_POST['medida']);
            $produto->atualizar();
            header("Location: ProdutoController.php?action=gerenciar&msg=Produto atualizado com sucesso!");
            exit();
        }
        include '../views/produto/cadastro.php'; // Reutilizando o cadastro para edição
    }
}
?>
