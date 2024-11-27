<?php
// Incluir o arquivo de configuração para conectar ao banco de dados
include_once($_SERVER['DOCUMENT_ROOT'] . '/APAE/database/config.php');

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário
    $nome_prato = $_POST['nome_prato'];
    $ingredientes = $_POST['ingredientes'];
    $valor_nutricional = $_POST['valor_nutricional'];
    $data_validade = $_POST['data_validade'];
    $categoria = $_POST['categoria'];
    $preco = $_POST['preco'];

    try {
        // Conectar ao banco de dados
        $db = new PDO('mysql:host=localhost;dbname=apae_db', 'root', '');

        // Preparar a consulta SQL para inserir os dados na tabela cardapios
        $stmt = $db->prepare("INSERT INTO cardapios (nome_prato, ingredientes, valor_nutricional, data_validade, categoria, preco) 
                              VALUES (?, ?, ?, ?, ?, ?)");

        // Executar a consulta
        $stmt->execute([
            $nome_prato,
            $ingredientes,
            $valor_nutricional,
            $data_validade,
            $categoria,
            $preco
        ]);

        // Redirecionar ou exibir uma mensagem de sucesso
        echo "Cardápio cadastrado com sucesso!";
    } catch (PDOException $e) {
        // Exibir mensagem de erro em caso de falha
        echo "Erro ao cadastrar cardápio: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cardápio</title>
    <link rel="stylesheet" href="../css/Cadastro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Cadastrar Cardápio</h1>
        <form method="post" action="index.php?page=cadastrar_cardapio">
            <div class="form-group">
                <label for="nome_prato">Nome do Prato:</label>
                <input type="text" name="nome_prato" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="ingredientes">Ingredientes:</label>
                <textarea name="ingredientes" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="valor_nutricional">Valor Nutricional:</label>
                <textarea name="valor_nutricional" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="data_validade">Data de Validade:</label>
                <input type="date" name="data_validade" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <select name="categoria" class="form-control" required>
                    <option value="Prato Principal">Prato Principal</option>
                    <option value="Sobremesa">Sobremesa</option>
                    <option value="Lanche">Lanche</option>
                    <option value="Bebida">Bebida</option>
                    <option value="Salada">Salada</option>
                </select>
            </div>
            <div class="form-group">
                <label for="preco">Preço:</label>
                <input type="text" name="preco" class="form-control" required>
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
