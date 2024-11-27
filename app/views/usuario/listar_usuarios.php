<?php 
// Incluir o arquivo de configuração para conectar ao banco de dados
include_once($_SERVER['DOCUMENT_ROOT'] . '/APAE/database/config.php');

// Criar uma instância da classe Database
$database = new Database();
$conn = $database->getConnection();

// Verificar se há um filtro de role
$filter_role = isset($_GET['role']) ? $_GET['role'] : '';

// Consulta para obter os usuários, filtrando por role se necessário
$sql = "
    SELECT id, nome, email, telefone, role FROM administradores
    UNION 
    SELECT id, nome, email, telefone, 'nutricionista' AS role FROM nutricionistas
    UNION 
    SELECT id, nome, email, telefone, 'funcionario' AS role FROM funcionarios
";

// Adicionando um filtro de 'role' à consulta, se um filtro for aplicado
if ($filter_role) {
    $sql = "
        SELECT id, nome, email, telefone, role FROM administradores WHERE role = '$filter_role'
        UNION 
        SELECT id, nome, email, telefone, 'nutricionista' AS role FROM nutricionistas WHERE 'role' = '$filter_role'
        UNION 
        SELECT id, nome, email, telefone, 'funcionario' AS role FROM funcionarios WHERE 'role' = '$filter_role'
    ";
}

// Executar a consulta
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários Cadastrados</title>
    <link rel="stylesheet" href="../css/home.css"> <!-- Link para o arquivo CSS -->
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
                        <a class="nav-link active" aria-current="page" href="listar_usuarios.php">Usuários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cotacoes_cadastradas.php">Cotações</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">Usuários Cadastrados</h1>

        <!-- Filtro de Role -->
        <form method="GET" class="mb-4">
            <label for="role">Filtrar por Role:</label>
            <select name="role" id="role" class="form-select" onchange="this.form.submit()">
                <option value="" <?php if($filter_role == '') echo 'selected'; ?>>Todos</option>
                <option value="admin" <?php if($filter_role == 'admin') echo 'selected'; ?>>Administrador</option>
                <option value="nutricionista" <?php if($filter_role == 'nutricionista') echo 'selected'; ?>>Nutricionista</option>
                <option value="funcionario" <?php if($filter_role == 'funcionario') echo 'selected'; ?>>Funcionário</option>
            </select>
        </form>

        <!-- Tabela de Usuários -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Role</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->rowCount() > 0) {
                    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nome'] . " " . $row['sobrenome'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['telefone'] . "</td>";
                        echo "<td>" . $row['role'] . "</td>";
                        echo "<td>
                                <a href='editar_usuario.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Editar</a>
                                <a href='excluir_usuario.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Tem certeza que deseja excluir este usuário?\");'>Excluir</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Nenhum usuário encontrado</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <a href="cadastro.php" class="btn btn-primary">Cadastrar Novo Usuário</a>
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
