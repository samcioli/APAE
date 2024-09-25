<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Listagem de Nutricionistas</title>
</head>
<body>
<div class="container">
    <h1 class="mt-4">Nutricionistas Cadastrados</h1>

    <?php if (isset($_GET['msg'])): ?>
        <div class="alert alert-info"><?php echo $_GET['msg']; ?></div>
    <?php endif; ?>

    <a href="nutricionista_form.php" class="btn btn-success mb-3">Cadastrar Nutricionista</a>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>CPF</th>
                <th>CRN</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nutricionistas as $nutricionista): ?>
                <tr>
                    <td><?php echo $nutricionista['id']; ?></td>
                    <td><?php echo $nutricionista['cpf']; ?></td>
                    <td><?php echo $nutricionista['crn']; ?></td>
                    <td><?php echo $nutricionista['nome']; ?></td>
                    <td><?php echo $nutricionista['sobrenome']; ?></td>
                    <td>
                        <a href="NutricionistaController.php?action=editar&id=<?php echo $nutricionista['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="NutricionistaController.php?action=excluir&id=<?php echo $nutricionista['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                        <a href="index.php?entity=cardapio&action=cadastrar&id_nutricionista=<?php echo $nutricionista['id']; ?>" class="btn btn-info btn-sm">Cadastrar Cardápio</a>
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
