<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Relatório</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Cadastrar Relatório</h1>

        <?php if (isset($erro)): ?>
            <div class="alert alert-danger"><?php echo $erro; ?></div>
        <?php endif; ?>

        <form method="POST" action="index.php?page=cadastrar_relatorio">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="data_emissao">Data de Emissão:</label>
                <input type="date" name="data_emissao" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" name="autor" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success mt-3">Cadastrar</button>
            <a href="index.php" class="btn btn-secondary mt-3">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
