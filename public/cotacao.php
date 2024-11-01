<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cotação</title>
    <link rel="stylesheet" href="../css/Cadastro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Cadastrar Cotação</h1>
        <form method="post" action="index.php?page=cadastrar_cotacao">
            <div class="form-group">
                <label for="nome_produto">Nome do Produto:</label>
                <input type="text" name="nome_produto" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nome_fornecedor">Nome do Fornecedor:</label>
                <input type="text" name="nome_fornecedor" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="preco_unitario">Preço Unitário:</label>
                <input type="text" name="preco_unitario" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="data_cotacao">Data da Cotação:</label>
                <input type="date" name="data_cotacao" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <select name="categoria" class="form-control" required>
                    <option value="Ceasa">Ceasa (Frutas e Verduras)</option>
                    <option value="Frutas">Frutas</option>
                    <option value="Verduras">Verduras</option>
                    <option value="Higiene Pessoal">Higiene Pessoal</option>
                    <option value="Açougue">Açougue (Carnes)</option>
                    <option value="Alimentícios">Alimentícios</option>
                    <option value="Limpeza">Limpeza</option>
                    <option value="Descartáveis">Descartáveis</option>
                    <option value="Frios">Frios</option>
                    <option value="Outros">Outros</option>
                </select>
            </div>
            <div class="form-group">
                <label for="unidade">Unidade:</label>
                <select name="unidade" class="form-control" required>
                    <option value="CX">CX – Caixa</option>
                    <option value="UN">UN – Unidade</option>
                    <option value="KG">KG – Quilograma</option>
                    <option value="MC">MC – Maço</option>
                    <option value="SC">SC – Saco</option>
                    <option value="BDJ">BDJ – Bandeja</option>
                    <option value="CBÇ">CBÇ – Cabeça (É unidade)</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Cadastrar</button>
            <a href="index.php?page=home" class="btn btn-secondary">Cancelar</a>
        </form>
        <?php if (isset($erro)): ?>
            <div class="alert alert-danger mt-3"><?php echo $erro; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
