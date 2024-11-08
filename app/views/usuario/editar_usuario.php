<?php
// Incluir a configuração e conexão com o banco
include_once($_SERVER['DOCUMENT_ROOT'] . '/APAE/database/config.php');

// Obter o ID do usuário a ser editado
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Criar uma instância da classe Usuario
    $usuario = new Usuario();

    // Buscar os dados do usuário
    $usuarioData = $usuario->buscarUsuarioPorId($id);
} else {
    die('Usuário não encontrado!');
}

// Atualizar os dados do usuário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coletar os dados do formulário
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    // Atualizar o usuário no banco de dados
    $usuario->atualizarUsuario($id, $nome, $sobrenome, $email, $telefone, $endereco);

    // Redirecionar para a lista de usuários após a atualização
    header("Location: listar_usuarios.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Editar Usuário</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Editar Usuário</h1>

        <!-- Formulário de edição -->
        <form method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?= $usuarioData['nome']; ?>" required>
            </div>
            <div class="form-group">
                <label for="sobrenome">Sobrenome</label>
                <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="<?= $usuarioData['sobrenome']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $usuarioData['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="<?= $usuarioData['telefone']; ?>" required>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" value="<?= $usuarioData['endereco']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="listar_usuarios.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
