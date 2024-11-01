<?php
require_once '../app/models/Cotacao.php';

class CotacaoController {
    public function cadastrar() {
        $erro = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Cria uma nova instância do modelo de cotação
            $cotacao = new Cotacao($_POST); // Passa todos os dados do formulário ao construtor

            // Tenta salvar os dados no banco
            if ($cotacao->salvar()) {
                header("Location: index.php?page=success");
                exit();
            } else {
                $erro = "Erro ao cadastrar. Tente novamente.";
            }
        }

        // Inclui a visão do cadastro
        include '../public/cotacao.php';
    }
}

?>
