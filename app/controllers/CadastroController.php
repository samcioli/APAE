<?php
require_once '../app/models/Cadastro.php';

class CadastroController {
    public function cadastrar() {
        $erro = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Cria uma nova instância do modelo de cadastro
            $cadastro = new Cadastro($_POST); // Passa todos os dados do formulário ao construtor

            // Tenta salvar os dados no banco
            if ($cadastro->salvar()) {
                header("Location: index.php?page=success");
                exit();
            } else {
                $erro = "Erro ao cadastrar. Tente novamente.";
            }
        }

        // Inclui a visão do cadastro
        include '../public/cadastro.php';
    }
}
?>
