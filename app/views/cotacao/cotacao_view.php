<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Cotações</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Cotações</h1>
        <a href="index.php?page=cadastrar_cotacao" class="btn btn-primary mb-3">Cadastrar Nova Cotação</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Produto ID</th>
                    <th>Fornecedor ID</th>
                    <th>Preço Unitário</th>
                    <th>Quantidade</th>
                    <th>Data da Cotação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $cotacoes = CotacaoController::listar();
                foreach ($cotacoes as $cotacao) {
                    echo "<tr>
                        <td>{$cotacao['id']}</td>
                        <td>{$cotacao['produto_id']}</td>
                        <td>{$cotacao['fornecedor_id']}</td>
                        <td>{$cotacao['preco_unitario']}</td>
                        <td>{$cotacao['quantidade']}</td>
                        <td>{$cotacao['data_cotacao']}</td>
                        <td>
                            <a href='index.php?page=editar_cotacao&id={$cotacao['id']}' class='btn btn-warning'>Editar</a>
                            <a href='index.php?page=excluir_cotacao&id={$cotacao['id']}' class='btn btn-danger' onclick='return confirm(\"Tem certeza que deseja excluir?\");'>Excluir</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
