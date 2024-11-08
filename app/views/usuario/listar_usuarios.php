<?php
// Incluir o arquivo de configuração e a classe Usuario para conectar ao banco de dados e buscar dados
include($_SERVER['DOCUMENT_ROOT'] . '/APAE/database/config.php');

require_once('../../models/Usuario.php');

// Captura o valor do filtro de role (se passado pela URL)
$roleFiltro = isset($_GET['role']) ? $_GET['role'] : '';

// Criar uma instância da classe Usuario
$usuario = new Usuario();
$usuarios = $usuario->buscarUsuariosPorRole($roleFiltro); // Passando o filtro de role
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
                        <a class="nav-link" a href="../app/views/cotacao/cotacoes_cadastradas.php" >Cotações</a> <!-- Link para o logout -->
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../app/views/usuario/listar_usuarios.php">Funcionarios</a> <!-- Link para o logout -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h1 class="text-center">Usuários Cadastrados</h1>

        <!-- Filtro de Role -->
        <form method="GET" class="mb-4">
            <div class="form-group">
                <label for="role">Filtrar por Role:</label>
                <select name="role" id="role" class="form-control">
                    <option value="">Todos</option>
                    <option value="admin" <?php if ($roleFiltro == 'admin') echo 'selected'; ?>>Administrador</option>
                    <option value="funcionario" <?php if ($roleFiltro == 'funcionario') echo 'selected'; ?>>Funcionário</option>
                    <option value="nutricionista" <?php if ($roleFiltro == 'nutricionista') echo 'selected'; ?>>Nutricionista</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </form>

        <!-- Tabela de usuários -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Data de Nascimento</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Verificar se há resultados
                if (!empty($usuarios)) {
                    // Exibir cada usuário
                    foreach ($usuarios as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['cpf'] . "</td>";
                        echo "<td>" . $row['nome'] . "</td>";
                        echo "<td>" . $row['sobrenome'] . "</td>";
                        echo "<td>" . $row['data_nascimento'] . "</td>";
                        echo "<td>" . $row['endereco'] . "</td>";
                        echo "<td>" . $row['telefone'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['role'] . "</td>";
                        echo "<td>
                                <a href='editar_usuario.php?id=" . $row['id'] . "' class='btn btn-warning'>Editar</a>
                                <a href='excluir_usuario.php?id=" . $row['id'] . "' class='btn btn-danger' onclick='return confirm(\"Tem certeza que deseja excluir este usuário?\");'>Excluir</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10' class='text-center'>Nenhum usuário encontrado</td></tr>";
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
