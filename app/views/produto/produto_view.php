<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Gerenciamento de Produtos</title>
</head>
<body>
<div class="container">
    <h1 class="mt-4">Produtos Cadastrados</h1>

    <?php if (isset($_GET['msg'])): ?>
        <div class="alert alert-info"><?php echo $_GET['msg']; ?></div>
    <?php endif; ?>

    <a href="ProdutoController.php?action=cadastrar" class="btn btn-success mb-3">Cadastrar Produto</a>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Medida</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto): ?>
                <tr>
                    <td><?php echo $produto['id']; ?></td>
                    <td><?php echo $produto['nome']; ?></td>
                    <td><?php echo $produto['categoria']; ?></td>
                    <td><?php echo $produto['medida']; ?></td>
                    <td>
                        <a href="ProdutoController.php?action=editar&id=<?php echo $produto['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="ProdutoController.php?action=excluir&id=<?php echo $produto['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
