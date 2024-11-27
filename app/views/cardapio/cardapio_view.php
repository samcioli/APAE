<?php
// Incluir o arquivo de configuração para conectar ao banco de dados
include_once($_SERVER['DOCUMENT_ROOT'] . '/APAE/database/config.php');

// Criar uma instância da classe Database
$database = new Database();
$conn = $database->getConnection();

// Consulta para obter todos os cardápios
$sql = "SELECT * FROM cardapios";

// Executar a consulta
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápios Cadastrados</title>
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
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../app/views/cardapio/cardapios_cadastrados.php">Cardápios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../app/views/usuario/listar_usuarios.php">Funcionários</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">Cardápios Cadastrados</h1>

        <!-- Tabela de cardápios -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome do Prato</th>
                    <th>Ingredientes</th>
                    <th>Valor Nutricional</th>
                    <th>Data de Validade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Verificar se há resultados
                if ($result->rowCount() > 0) {
                    // Exibir cada cardápio
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nome_prato'] . "</td>";  // Nome do Prato
                        echo "<td>" . $row['ingredientes'] . "</td>";  // Ingredientes
                        echo "<td>" . $row['valor_nutricional'] . "</td>";  // Valor Nutricional
                        echo "<td>" . $row['data_validade'] . "</td>";  // Data de Validade
                        echo "<td>
                                <a href='editar_cardapio.php?id=" . $row['id'] . "' class='btn btn-warning'>Editar</a>
                                <a href='excluir_cardapio.php?id=" . $row['id'] . "' class='btn btn-danger' onclick='return confirm(\"Tem certeza que deseja excluir este cardápio?\");'>Excluir</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Nenhum cardápio encontrado</td></tr>";
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
