<?php
// Incluir o arquivo de configuração para conectar ao banco de dados
include_once($_SERVER['DOCUMENT_ROOT'] . '/APAE/database/config.php');

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
    <title>Página Inicial</title>
    <link rel="stylesheet" href="../css/home.css"> <!-- Link para o arquivo CSS (adicione o seu) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">APAE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" a href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../app/views/cotacao/cotacoes_cadastradas.php" >Cotações</a> <!-- Link para o logout -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" a href="../app/views/usuario/listar_usuarios.php" >Funcionarios</a> <!-- Link para o logout -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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
                                <a href='excluir_cotacao.php?id=" . $row['id'] . "' class='btn btn-danger' onclick='return confirm(\"Tem certeza que deseja excluir esta cotação?\");'>Excluir</a>
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
