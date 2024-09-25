<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Listagem de Cardápios</title>
</head>
<body>
<div class="container">
    <h1 class="mt-4">Cardápios Cadastrados</h1>

    <?php if (isset($_GET['msg'])): ?>
        <div class="alert alert-info"><?php echo $_GET['msg']; ?></div>
    <?php endif; ?>

    <a href="cardapio_form.php" class="btn btn-success mb-3">Cadastrar Cardápio</a>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome do Prato</th>
                <th>Ingredientes</th>
                <th>Valor Nutricional</th>
                <th>Data de Validade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cardapios as $cardapio): ?>
                <tr>
                    <td><?php echo $cardapio['id']; ?></td>
                    <td><?php echo $cardapio['nome_prato']; ?></td>
                    <td><?php echo $cardapio['ingredientes']; ?></td>
                    <td><?php echo $cardapio['valor_nutricional']; ?></td>
                    <td><?php echo $cardapio['data_validade']; ?></td>
                    <td>
                        <a href="CardapioController.php?action=editar&id=<?php echo $cardapio['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="CardapioController.php?action=excluir&id=<?php echo $cardapio['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.5.2.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
