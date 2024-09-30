<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Cadastros</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Listar Cadastros</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cadastros as $cadastro): ?>
                <tr>
                    <td><?php echo $cadastro['id']; ?></td>
                    <td><?php echo $cadastro['cpf']; ?></td>
                    <td><?php echo $cadastro['nome']; ?></td>
                    <td><?php echo $cadastro['sobrenome']; ?></td>
                    <td><?php echo $cadastro['email']; ?></td>
                    <td>
                        <a href="index.php?page=editar&id=<?php echo $cadastro['id']; ?>" class="btn btn-warning">Editar</a>
                        <a href="index.php?page=deletar&id=<?php echo $cadastro['id']; ?>" class="btn btn-danger">Deletar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="index.php?page=cadastro" class="btn btn-primary">Cadastrar Novo</a>
    </div>
</body>
</html>
