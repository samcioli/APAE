<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title><?php echo isset($cotacao) ? 'Editar Cotação' : 'Cadastrar Cotação'; ?></title>
</head>
<body>
    <div class="container mt-5">
        <h1><?php echo isset($cotacao) ? 'Editar Cotação' : 'Cadastrar Cotação'; ?></h1>
        <form action="index.php?page=<?php echo isset($cotacao) ? 'editar_cotacao_action&id=' . $cotacao->id : 'cadastrar_cotacao_action'; ?>" method="POST">
            <div class="form-group">
                <label for="produto_id">Produto ID</label>
                <input type="number" class="form-control" id="produto_id" name="produto_id" value="<?php echo isset($cotacao) ? $cotacao->produto_id : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="fornecedor_id">Fornecedor ID</label>
                <input type="number" class="form-control" id="fornecedor_id" name="fornecedor_id" value="<?php echo isset($cotacao) ? $cotacao->fornecedor_id : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="preco_unitario">Preço Unitário</label>
                <input type="text" class="form-control" id="preco_unitario" name="preco_unitario" value="<?php echo isset($cotacao) ? $cotacao->preco_unitario : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" value="<?php echo isset($cotacao) ? $cotacao->quantidade : ''; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo isset($cotacao) ? 'Atualizar' : 'Cadastrar'; ?></button>
            <a href="index.php?page=cotacao_view" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
