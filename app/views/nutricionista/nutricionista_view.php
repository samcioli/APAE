<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Nutricionistas</title>
</head>
<body>
    <h1>Lista de Nutricionistas</h1>
    <a href="nutricionista_form.php">Cadastrar Novo Nutricionista</a>

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
        <?php foreach ($nutricionistas as $nutricionista): ?>
            <tr>
                <td><?php echo $nutricionista['id']; ?></td>
                <td><?php echo $nutricionista['nome']; ?></td>
                <td><?php echo $nutricionista['sobrenome']; ?></td>
                <td><?php echo $nutricionista['email']; ?></td>
                <td>
                    <a href="nutricionista_form.php?id=<?php echo $nutricionista['id']; ?>">Editar</a>
                    <a href="?action=excluir&id=<?php echo $nutricionista['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
