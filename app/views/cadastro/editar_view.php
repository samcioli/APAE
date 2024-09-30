<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cadastro</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Editar Cadastro</h1>
        <form method="post" action="index.php?page=editar&id=<?php echo $cadastro['id']; ?>">
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" class="form-control" value="<?php echo $cadastro['cpf']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" class="form-control" value="<?php echo $cadastro['nome']; ?>" required>
            </div>
            <div class="form-group">
                <label for="sobrenome">Sobrenome:</label>
                <input type="text" name="sobrenome" class="form-control" value="<?php echo $cadastro['sobrenome']; ?>" required>
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" name="data_nascimento" class="form-control" value="<?php echo $cadastro['data_nascimento']; ?>" required>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" name="endereco" class="form-control" value="<?php echo $cadastro['endereco']; ?>" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" name="telefone" class="form-control" value="<?php echo $cadastro['telefone']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" value="<?php echo $cadastro['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="role">Função:</label>
                <select name="role" class="form-control" required>
                    <option value="admin" <?php if ($cadastro['role'] === 'admin') echo 'selected'; ?>>Admin</option>
                    <option value="funcionario" <?php if ($cadastro['role'] === 'funcionario') echo 'selected'; ?>>Funcionário</option>
                    <option value="nutricionista" <?php if ($cadastro['role'] === 'nutricionista') echo 'selected'; ?>>Nutricionista</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Atualizar</button>
        </form>
        <?php if (isset($erro)): ?>
            <div class="alert alert-danger mt-3"><?php echo $erro; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
