<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Formulário de Nutricionista</title>
</head>
<body>
<div class="container">
    <h1 class="mt-4"><?php echo isset($nutricionista) ? 'Editar Nutricionista' : 'Cadastrar Nutricionista'; ?></h1>
    
    <form method="POST" action="NutricionistaController.php?action=<?php echo isset($nutricionista) ? 'editar&id=' . $nutricionista->id : 'cadastrar'; ?>">
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" name="cpf" value="<?php echo isset($nutricionista) ? $nutricionista->cpf : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="crn">CRN</label>
            <input type="text" class="form-control" name="crn" value="<?php echo isset($nutricionista) ? $nutricionista->crn : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" value="<?php echo isset($nutricionista) ? $nutricionista->nome : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="sobrenome">Sobrenome</label>
            <input type="text" class="form-control" name="sobrenome" value="<?php echo isset($nutricionista) ? $nutricionista->sobrenome : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" class="form-control" name="data_nascimento" value="<?php echo isset($nutricionista) ? $nutricionista->data_nascimento : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" name="endereco" value="<?php echo isset($nutricionista) ? $nutricionista->endereco : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" name="telefone" value="<?php echo isset($nutricionista) ? $nutricionista->telefone : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email" value="<?php echo isset($nutricionista) ? $nutricionista->email : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" name="senha" required>
        </div>
        <button type="submit" class="btn btn-primary"><?php echo isset($nutricionista) ? 'Atualizar' : 'Cadastrar'; ?></button>
        <a href="nutricionista_view.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
