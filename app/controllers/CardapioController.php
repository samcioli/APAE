<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/APAE/database/config.php');

class CardapioController {

    // Função para processar o cadastro
    public function cadastrar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Captura os dados do formulário
            $nome_prato = $_POST['nome_prato'];
            $ingredientes = $_POST['ingredientes'];
            $valor_nutricional = $_POST['valor_nutricional'];
            $data_validade = $_POST['data_validade'];
            $categoria = $_POST['categoria'];
            $preco = $_POST['preco'];

            // Verifica se todos os campos estão preenchidos
            if (empty($nome_prato) || empty($ingredientes) || empty($valor_nutricional) || empty($data_validade) || empty($categoria) || empty($preco)) {
                $erro = "Todos os campos são obrigatórios!";
                include 'cadastro_cardapio.php'; // Exibe o formulário novamente com erro
                return;
            }

            try {
                // Conectar ao banco de dados
                $db = new Database();
                $conn = $db->getConnection();

                // Preparar a consulta SQL para inserir os dados na tabela cardapios
                $stmt = $conn->prepare("INSERT INTO cardapios (nome_prato, ingredientes, valor_nutricional, data_validade, categoria, preco) 
                                        VALUES (?, ?, ?, ?, ?, ?)");

                // Executar a consulta
                $stmt->execute([
                    $nome_prato,
                    $ingredientes,
                    $valor_nutricional,
                    $data_validade,
                    $categoria,
                    $preco
                ]);

                include 'home.php'; // Redirecionar para a página inicial ou lista de cardápios
            } catch (PDOException $e) {
                echo "Erro ao cadastrar cardápio: " . $e->getMessage();
            }
        } else {
            // Se não for POST, mostra o formulário
            include 'cadastro_cardapio.php';
        }
    }
}
?>
