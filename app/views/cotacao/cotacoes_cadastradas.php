<?php
// Incluir o arquivo de configuração para conectar ao banco de dados
include('config.php');

// Criar uma instância da classe Database
$database = new Database();
$conn = $database->getConnection();

// Consulta para obter todas as cotações, sem fazer JOINs
$sql = "SELECT * FROM cotacoes";

// Executar a consulta
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Cotações Cadastradas</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Cotações Cadastradas</h1>

        <!-- Tabela de cotações -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Produto ID</th>
                    <th>Fornecedor ID</th>
                    <th>Categoria</th>
                    <th>Unidade</th>
                    <th>Preço Unitário</th>
                    <th>Quantidade</th>
                    <th>Data da Cotação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Verificar se há resultados
                if ($result->rowCount() > 0) {
                    // Exibir cada cotação
                    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['id_produto'] . "</td>";  // ID do Produto
                        echo "<td>" . $row['id_fornecedor'] . "</td>";  // ID do Fornecedor
                        echo "<td>" . $row['categoria'] . "</td>";
                        echo "<td>" . $row['unidade'] . "</td>";
                        echo "<td>" . number_format($row['preco_unitario'], 2, ',', '.') . "</td>";
                        echo "<td>" . $row['quantidade'] . "</td>";
                        echo "<td>" . $row['data_cotacao'] . "</td>";
                        echo "<td>
                                <a href='editar_cotacao.php?id=" . $row['id'] . "' class='btn btn-warning'>Editar</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9' class='text-center'>Nenhuma cotação encontrada</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <a href="index.php" class="btn btn-secondary">Voltar</a>
    </div>

    <!-- Scripts do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Fechar a conexão com o banco de dados
$conn = null;
?>
