<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar/Editar Administrador</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1><?php echo isset($admin) ? 'Editar Administrador' : 'Cadastrar Administrador'; ?></h1>
        <form method="post" action="index.php?page=<?php echo isset($admin) ? 'editar_admin_action&id=' . $admin['id'] : 'cadastrar_admin_action'; ?>">
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" class="form-control" value="<?php echo isset($admin) ? $admin['cpf'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" class="form-control" value="<?php echo isset($admin) ? $admin['nome'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="sobrenome">Sobrenome:</label>
                <input type="text" name="sobrenome" class="form-control" value="<?php echo isset($admin) ? $admin['sobrenome'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" name="data_nascimento" class="form-control" value="<?php echo isset($admin) ? $admin['data_nascimento'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" name="endereco" class="form-control" value="<?php echo isset($admin) ? $admin['endereco'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" name="telefone" class="form-control" value="<?php echo isset($admin) ? $admin['telefone'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" value="<?php echo isset($admin) ? $admin['email'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" class="form-control" <?php echo !isset($admin) ? 'required' : ''; ?>>
            </div>
            <button type="submit" class="btn btn-success"><?php echo isset($admin) ? 'Atualizar' : 'Cadastrar'; ?></button>
            <a href="index.php?page=admin_view" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
