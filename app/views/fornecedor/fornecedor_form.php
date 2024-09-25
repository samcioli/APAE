<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title><?php echo isset($fornecedor) ? 'Editar Fornecedor' : 'Cadastrar Fornecedor'; ?></title>
</head>
<body>
    <div class="container mt-5">
        <h1><?php echo isset($fornecedor) ? 'Editar Fornecedor' : 'Cadastrar Fornecedor'; ?></h1>
        <form action="index.php?page=<?php echo isset($fornecedor) ? 'editar_fornecedor_action&id=' . $fornecedor->id : 'cadastrar_fornecedor_action'; ?>" method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo isset($fornecedor) ? $fornecedor->nome : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo isset($fornecedor) ? $fornecedor->endereco : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="ramo_atuacao">Ramo de Atuação</label>
                <input type="text" class="form-control" id="ramo_atuacao" name="ramo_atuacao" value="<?php echo isset($fornecedor) ? $fornecedor->ramo_atuacao : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo isset($fornecedor) ? $fornecedor->telefone : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="whatsapp">WhatsApp</label>
                <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="<?php echo isset($fornecedor) ? $fornecedor->whatsapp : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($fornecedor) ? $fornecedor->email : ''; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo isset($fornecedor) ? 'Atualizar' : 'Cadastrar'; ?></button>
            <a href="index.php?page=fornecedor_view" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
