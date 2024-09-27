<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Cadastrar Usuário</h1>
        <form method="post" action="index.php?page=cadastrar">
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="sobrenome">Sobrenome:</label>
                <input type="text" name="sobrenome" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" name="data_nascimento" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" name="endereco" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" name="telefone" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="role">Função:</label>
                <select name="role" class="form-control" required>
                    <option value="admin">Admin</option>
                    <option value="funcionario">Funcionário</option>
                    <option value="nutricionista">Nutricionista</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Cadastrar</button>
            <a href="index.php?page=home" class="btn btn-secondary">Cancelar</a>
        </form>
        <?php if (isset($erro)): ?>
            <div class="alert alert-danger mt-3"><?php echo $erro; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
