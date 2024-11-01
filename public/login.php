<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/IndexPublic.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="text-center mb-4">
        <img src="../img/LogoAnimado.gif" alt="Logo" class="logo img-fluid">
    </div>
    <form method="post" action="login.php">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" required>

    <label for="role">Função:</label>
    <select id="role" name="role" required>
        <option value="admin">Admin</option>
        <option value="funcionario">Funcionário</option>
        <option value="nutricionista">Nutricionista</option>
    </select>

    <button type="submit">Entrar</button>
    <a href="../public/cadastro.php" class="btn btn-primary">Cadastrar</a>
</form>


</body>
</html>
