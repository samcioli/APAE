<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Administradores</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Gerenciar Administradores</h1>
        <a href="index.php?page=cadastrar_admin" class="btn btn-primary">Cadastrar Administrador</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $admins = AdminController::listar();
                foreach ($admins as $admin) {
                    echo "<tr>
                        <td>{$admin['id']}</td>
                        <td>{$admin['nome']} {$admin['sobrenome']}</td>
                        <td>{$admin['cpf']}</td>
                        <td>
                            <a href='index.php?page=editar_admin&id={$admin['id']}' class='btn btn-warning'>Editar</a>
                            <a href='index.php?page=excluir_admin&id={$admin['id']}' class='btn btn-danger' onclick='return confirm(\"Tem certeza que deseja excluir?\");'>Excluir</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
