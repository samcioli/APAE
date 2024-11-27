<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios Cadastrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Relatórios Cadastrados</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Data de Emissão</th>
                    <th>Autor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($relatorios) && count($relatorios) > 0) {
                    foreach ($relatorios as $relatorio) {
                        echo "<tr>";
                        echo "<td>" . $relatorio['id'] . "</td>";
                        echo "<td>" . $relatorio['titulo'] . "</td>";
                        echo "<td>" . $relatorio['descricao'] . "</td>";
                        echo "<td>" . $relatorio['data_emissao'] . "</td>";
                        echo "<td>" . $relatorio['autor'] . "</td>";
                        echo "<td>
                                <a href='editar_relatorio.php?id=" . $relatorio['id'] . "' class='btn btn-warning'>Editar</a>
                                <a href='excluir_relatorio.php?id=" . $relatorio['id'] . "' class='btn btn-danger' onclick='return confirm(\"Tem certeza que deseja excluir este relatório?\");'>Excluir</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Nenhum relatório encontrado</td></tr>";
                }
                ?>
            </tbody>
        </table>
        
        <a href="index.php" class="btn btn-secondary">Voltar</a>
        <a href="relatorio.php" class="btn btn-primary">Cadastrar Novo Relatório</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
