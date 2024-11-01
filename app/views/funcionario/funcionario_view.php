<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Funcionários</title>
</head>
<body>
    <h1>Lista de Funcionários</h1>
    <a href="funcionario_form.php">Cadastrar Novo Funcionário</a>

    <?php if (isset($_GET['msg'])): ?>
        <p><?php echo $_GET['msg']; ?></p>
    <?php endif; ?>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($funcionarios as $funcionario): ?>
            <tr>
                <td><?php echo $funcionario['id']; ?></td>
                <td><?php echo $funcionario['nome']; ?></td>
                <td><?php echo $funcionario['sobrenome']; ?></td>
                <td><?php echo $funcionario['email']; ?></td>
                <td>
                    <a href="funcionario_form.php?id=<?php echo $funcionario['id']; ?>">Editar</a>
                    <a href="?action=excluir&id=<?php echo $funcionario['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
