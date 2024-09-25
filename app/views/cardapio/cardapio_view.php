<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Cardápios</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Gerenciar Cardápios</h1>
        <a href="index.php?page=cadastrar_cardapio" class="btn btn-primary">Cadastrar Cardápio</a>

        <table class="table table-striped">
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
                <?php
                $cardapios = CardapioController::listar();
                foreach ($cardapios as $cardapio) {
                    echo "<tr>
                        <td>{$cardapio['id']}</td>
                        <td>{$cardapio['nome_prato']}</td>
                        <td>{$cardapio['ingredientes']}</td>
                        <td>{$cardapio['valor_nutricional']}</td>
                        <td>{$cardapio['data_validade']}</td>
                        <td>
                            <a href='index.php?page=editar_cardapio&id={$cardapio['id']}' class='btn btn-warning'>Editar</a>
                            <a href='index.php?page=excluir_cardapio&id={$cardapio['id']}' class='btn btn-danger' onclick='return confirm(\"Tem certeza que deseja excluir?\");'>Excluir</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
