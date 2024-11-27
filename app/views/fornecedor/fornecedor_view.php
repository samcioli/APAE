<?php
// Incluir o arquivo de configuração para conectar ao banco de dados
include_once($_SERVER['DOCUMENT_ROOT'] . '/APAE/database/config.php');

// Criar uma instância da classe Database
$database = new Database();
$conn = $database->getConnection();

// Consulta para obter todos os fornecedores
$sql = "SELECT * FROM fornecedores";

// Executar a consulta
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornecedores Cadastrados</title>
    <link rel="stylesheet" href="../css/home.css"> <!-- Link para o arquivo CSS (adicione o seu) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="fornecedores_cadastrados.php">Fornecedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../app/views/cardapio/cardapios_cadastrados.php">Cardápios</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">Fornecedores Cadastrados</h1>

        <!-- Tabela de fornecedores -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Ramo</th>
                    <th>Telefone</th>
                    <th>Whatsapp</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Verificar se há resultados
                if ($result->rowCount() > 0) {
                    // Exibir cada fornecedor
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nome'] . "</td>";  // Nome do Fornecedor
                        echo "<td>" . $row['endereco'] . "</td>";  // Endereço
                        echo "<td>" . $row['ramo'] . "</td>";  // Ramo
                        echo "<td>" . $row['telefone'] . "</td>";  // Telefone
                        echo "<td>" . $row['whatsapp'] . "</td>";  // Whatsapp
                        echo "<td>" . $row['email'] . "</td>";  // Email
                        echo "<td>
                                <a href='editar_fornecedor.php?id=" . $row['id'] . "' class='btn btn-warning'>Editar</a>
                                <a href='excluir_fornecedor.php?id=" . $row['id'] . "' class='btn btn-danger' onclick='return confirm(\"Tem certeza que deseja excluir este fornecedor?\");'>Excluir</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center'>Nenhum fornecedor encontrado</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <a href="index.php" class="btn btn-secondary">Voltar</a>
        <a href="fornecedor.php" class="btn btn-primary">Cadastrar Novo Fornecedor</a>
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
