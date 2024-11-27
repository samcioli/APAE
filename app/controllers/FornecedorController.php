<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/APAE/database/config.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/APAE/app/models/Fornecedor.php');  // Inclui a model

class FornecedorController {

    // Função para processar o cadastro de fornecedor
    public function cadastrar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Captura os dados do formulário
            $nome = $_POST['nome'];
            $endereco = $_POST['endereco'];
            $ramo = $_POST['ramo'];
            $telefone = $_POST['telefone'];
            $whatsapp = $_POST['whatsapp'];
            $email = $_POST['email'];

            // Verifica se todos os campos estão preenchidos
            if (empty($nome) || empty($endereco) || empty($ramo) || empty($telefone) || empty($email)) {
                $erro = "Todos os campos são obrigatórios!";
                include 'cadastro_fornecedor.php'; // Exibe o formulário novamente com erro
                return;
            }

            try {
                // Conectar ao banco de dados
                $db = new Database();
                $conn = $db->getConnection();

                // Criar uma instância da model Fornecedor
                $fornecedor = new Fornecedor($conn);

                // Passa os dados para a model usando os setters
                $fornecedor->setNome($nome);
                $fornecedor->setEndereco($endereco);
                $fornecedor->setRamo($ramo);
                $fornecedor->setTelefone($telefone);
                $fornecedor->setWhatsapp($whatsapp);
                $fornecedor->setEmail($email);

                // Chama o método para cadastrar o fornecedor
                if ($fornecedor->cadastrar()) {
                    // Caso o cadastro tenha sido bem-sucedido
                    header("Location: index.php?page=listar_fornecedores");  // Redireciona para a página de listagem
                } else {
                    // Caso haja erro no cadastro
                    $erro = "Erro ao cadastrar fornecedor. Tente novamente!";
                    include 'cadastro_fornecedor.php';  // Exibe o formulário novamente com erro
                }
            } catch (Exception $e) {
                $erro = "Erro de conexão: " . $e->getMessage();
                include 'cadastro_fornecedor.php';  // Exibe o formulário com erro
            }
        }
    }
}
?>
