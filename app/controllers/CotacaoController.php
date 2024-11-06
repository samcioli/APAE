<?php
require_once '../app/models/Cotacao.php';

class CotacaoController {

    // Método para cadastrar uma nova cotação
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

    // Método para editar uma cotação existente
    public function editar() {
        // Verifica se o ID da cotação foi passado pela URL
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Busca a cotação no banco de dados
            $cotacao = Cotacao::buscarPorId($id);

            if ($cotacao) {
                // Exibe o formulário de edição com os dados da cotação
                include '../public/editar_cotacao.php';
            } else {
                echo "Cotação não encontrada.";
                exit;
            }
        } else {
            echo "ID não fornecido.";
            exit;
        }
    }

    // Método para atualizar uma cotação existente
        public function atualizar() {
            // Verificar se os dados do formulário foram enviados
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Verificar se o ID da cotação foi enviado
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];  // Recuperar o ID da cotação da URL
                } else {
                    // Se não houver ID na URL, redirecionar para a lista
                    header('Location: index.php?page=cotacoes_cadastradas');
                    exit;
                }
    
                // Cria uma nova instância do modelo Cotacao com os dados do formulário
                $cotacao = new Cotacao($_POST);
                // Definir o ID para atualizar a cotação
                $cotacao->setId($id);
    
                // Tenta salvar os dados da cotação
                if ($cotacao->atualizar()) {
                    // Redireciona para a página de listagem de cotações
                    header('Location: index.php?page=cotacoes_cadastradas');
                    exit;
                } else {
                    // Caso haja erro ao salvar, pode adicionar uma mensagem de erro
                    $erro = "Erro ao atualizar a cotação. Tente novamente.";
                }
            }
    
            // Carregar o formulário de edição com os dados da cotação
            include '../public/editar_cotacao.php';
        }
}

?>
