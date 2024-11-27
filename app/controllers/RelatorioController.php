<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/APAE/database/config.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/APAE/app/models/Relatorio.php');  // Inclui a model de Relatório

class RelatorioController {

    // Função para processar o cadastro de relatorio
    public function cadastrar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Captura os dados do formulário
            $titulo = $_POST['titulo'];
            $descricao = $_POST['descricao'];
            $data_emissao = $_POST['data_emissao'];
            $autor = $_POST['autor'];

            // Verifica se todos os campos estão preenchidos
            if (empty($titulo) || empty($descricao) || empty($data_emissao) || empty($autor)) {
                $erro = "Todos os campos são obrigatórios!";
                include 'cadastro_relatorio.php'; // Exibe o formulário novamente com erro
                return;
            }

            try {
                // Conectar ao banco de dados
                $db = new Database();
                $conn = $db->getConnection();

                // Criar uma instância da model Relatorio
                $relatorio = new Relatorio($conn);

                // Passa os dados para a model usando os setters
                $relatorio->setTitulo($titulo);
                $relatorio->setDescricao($descricao);
                $relatorio->setDataEmissao($data_emissao);
                $relatorio->setAutor($autor);

                // Chama o método para cadastrar o relatório
                if ($relatorio->cadastrar()) {
                    // Caso o cadastro tenha sido bem-sucedido
                    header("Location: index.php?page=listar_relatorios");  // Redireciona para a página de listagem
                } else {
                    // Caso haja erro no cadastro
                    $erro = "Erro ao cadastrar relatório. Tente novamente!";
                    include 'cadastro_relatorio.php';  // Exibe o formulário novamente com erro
                }
            } catch (Exception $e) {
                $erro = "Erro de conexão: " . $e->getMessage();
                include 'cadastro_relatorio.php';  // Exibe o formulário com erro
            }
        }
    }

    // Função para listar os relatórios cadastrados
    public function listar() {
        try {
            // Conectar ao banco de dados
            $db = new Database();
            $conn = $db->getConnection();

            // Criar uma instância da model Relatorio
            $relatorio = new Relatorio($conn);

            // Buscar todos os relatórios cadastrados
            $relatorios = $relatorio->listarTodos();

            // Incluir a view para listar os relatórios
            include 'listar_relatorio.php';

        } catch (Exception $e) {
            $erro = "Erro ao buscar os relatórios: " . $e->getMessage();
            include 'listar_relatorio.php';
        }
    }
}
?>
