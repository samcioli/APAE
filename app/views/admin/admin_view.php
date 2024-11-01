<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Administradores</title>
</head>
<body>
    <h1>Lista de Administradores</h1>
    <a href="admin_form.php">Cadastrar Novo Administrador</a>

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
        <?php foreach ($administradores as $admin): ?>
            <tr>
                <td><?php echo $admin['id']; ?></td>
                <td><?php echo $admin['nome']; ?></td>
                <td><?php echo $admin['sobrenome']; ?></td>
                <td><?php echo $admin['email']; ?></td>
                <td>
                    <a href="admin_form.php?id=<?php echo $admin['id']; ?>">Editar</a>
                    <a href="?action=excluir&id=<?php echo $admin['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
