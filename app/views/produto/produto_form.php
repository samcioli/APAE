<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Cadastrar Produto</title>
</head>
<body>
<div class="container">
    <h1 class="mt-4">Cadastrar Produto</h1>
    <form action="ProdutoController.php" method="post">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <input type="text" class="form-control" id="categoria" name="categoria" required>
        </div>
        <div class="form-group">
            <label for="medida">Medida</label>
            <input type="text" class="form-control" id="medida" name="medida" required>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <a href="ProdutoController.php?action=gerenciar" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
