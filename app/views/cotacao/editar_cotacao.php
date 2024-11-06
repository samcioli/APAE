<?php
// Incluir o arquivo de configuração para conectar ao banco de dados
include('config.php');

// Criar uma instância da classe Database
$database = new Database();
$conn = $database->getConnection();

// Verificar se o id foi passado via URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para pegar os dados da cotação pelo ID
    $sql = "SELECT * FROM cotacoes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $id, PDO::PARAM_INT); // Usando PDO::PARAM_INT
    $stmt->execute();
    $cotacao = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$cotacao) {
        echo "Cotação não encontrada.";
        exit;
    }
} else {
    echo "ID não fornecido.";
    exit;
}
?>
<!-- editar_cotacao.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cotação</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Cotação</h1>
        <form method="POST" action="index.php?page=editar_cotacao_action&id=<?php echo $cotacao['id']; ?>">
            <div class="form-group">
                <label for="nome_produto">Nome do Produto:</label>
                <input type="text" class="form-control" id="nome_produto" name="nome_produto" value="<?php echo $cotacao['nome_produto']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nome_fornecedor">Nome do Fornecedor:</label>
                <input type="text" class="form-control" id="nome_fornecedor" name="nome_fornecedor" value="<?php echo $cotacao['nome_fornecedor']; ?>" required>
            </div>
            <div class="form-group">
                <label for="preco_unitario">Preço Unitário:</label>
                <input type="text" class="form-control" id="preco_unitario" name="preco_unitario" value="<?php echo $cotacao['preco_unitario']; ?>" required>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade:</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" value="<?php echo $cotacao['quantidade']; ?>" required>
            </div>
            <div class="form-group">
                <label for="data_cotacao">Data da Cotação:</label>
                <input type="date" class="form-control" id="data_cotacao" name="data_cotacao" value="<?php echo $cotacao['data_cotacao']; ?>" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <select class="form-control" id="categoria" name="categoria" required>
                    <option value="Ceasa" <?php echo ($cotacao['categoria'] == 'Ceasa') ? 'selected' : ''; ?>>Ceasa (Frutas e Verduras)</option>
                    <option value="Frutas" <?php echo ($cotacao['categoria'] == 'Frutas') ? 'selected' : ''; ?>>Frutas</option>
                    <option value="Verduras" <?php echo ($cotacao['categoria'] == 'Verduras') ? 'selected' : ''; ?>>Verduras</option>
                    <!-- Adicionar outras opções conforme necessário -->
                </select>
            </div>
            <div class="form-group">
                <label for="unidade">Unidade:</label>
                <select class="form-control" id="unidade" name="unidade" required>
                    <option value="CX" <?php echo ($cotacao['unidade'] == 'CX') ? 'selected' : ''; ?>>CX – Caixa</option>
                    <option value="UN" <?php echo ($cotacao['unidade'] == 'UN') ? 'selected' : ''; ?>>UN – Unidade</option>
                    <option value="KG" <?php echo ($cotacao['unidade'] == 'KG') ? 'selected' : ''; ?>>KG – Quilograma</option>
                    <!-- Adicionar outras opções conforme necessário -->
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="index.php?page=cotacoes_cadastradas" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
