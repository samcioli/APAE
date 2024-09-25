<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar/Editar Cardápio</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1><?php echo isset($cardapio) ? 'Editar Cardápio' : 'Cadastrar Cardápio'; ?></h1>
        <form method="post" action="index.php?page=<?php echo isset($cardapio) ? 'editar_cardapio_action&id=' . $cardapio->id : 'cadastrar_cardapio_action'; ?>">
            <div class="form-group">
                <label for="nome_prato">Nome do Prato:</label>
                <input type="text" name="nome_prato" class="form-control" value="<?php echo isset($cardapio) ? $cardapio->nome_prato : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="ingredientes">Ingredientes:</label>
                <textarea name="ingredientes" class="form-control" required><?php echo isset($cardapio) ? $cardapio->ingredientes : ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="valor_nutricional">Valor Nutricional:</label>
                <input type="text" name="valor_nutricional" class="form-control" value="<?php echo isset($cardapio) ? $cardapio->valor_nutricional : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="data_validade">Data de Validade:</label>
                <input type="date" name="data_validade" class="form-control" value="<?php echo isset($cardapio) ? $cardapio->data_validade : ''; ?>" required>
            </div>
            <button type="submit" class="btn btn-success"><?php echo isset($cardapio) ? 'Atualizar' : 'Cadastrar'; ?></button>
            <a href="index.php?page=cardapio_view" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
