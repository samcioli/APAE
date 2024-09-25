<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Fornecedores</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Fornecedores</h1>
        <a href="index.php?page=cadastrar_fornecedor" class="btn btn-primary mb-3">Cadastrar Novo Fornecedor</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Ramo de Atuação</th>
                    <th>Telefone</th>
                    <th>WhatsApp</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $fornecedores = FornecedorController::listar();
                foreach ($fornecedores as $fornecedor) {
                    echo "<tr>
                        <td>{$fornecedor['id']}</td>
                        <td>{$fornecedor['nome']}</td>
                        <td>{$fornecedor['endereco']}</td>
                        <td>{$fornecedor['ramo_atuacao']}</td>
                        <td>{$fornecedor['telefone']}</td>
                        <td>{$fornecedor['whatsapp']}</td>
                        <td>{$fornecedor['email']}</td>
                        <td>
                            <a href='index.php?page=editar_fornecedor&id={$fornecedor['id']}' class='btn btn-warning'>Editar</a>
                            <a href='index.php?page=excluir_fornecedor&id={$fornecedor['id']}' class='btn btn-danger' onclick='return confirm(\"Tem certeza que deseja excluir?\");'>Excluir</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
