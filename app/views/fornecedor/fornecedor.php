<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Fornecedor</title>
    <!-- Link para o CSS personalizado -->
    <link rel="stylesheet" href="../css/style.css"> <!-- Adicione seu CSS -->
    <!-- Link para o Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Cadastrar Fornecedor</h1>

        <!-- Exibe mensagem de erro, se houver -->
        <?php if (isset($erro)): ?>
            <div class="alert alert-danger"><?php echo $erro; ?></div>
        <?php endif; ?>

        <!-- Formulário de cadastro -->
        <form method="post" action="index.php?page=cadastrar_fornecedor">
            
            <!-- Campo para o Nome do Fornecedor -->
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>

            <!-- Campo para o Endereço do Fornecedor -->
            <div class="mb-3">
                <label for="endereco" class="form-label">Endereço:</label>
                <input type="text" name="endereco" id="endereco" class="form-control" required>
            </div>

            <!-- Campo para o Ramo de Atuação do Fornecedor -->
            <div class="mb-3">
                <label for="ramo" class="form-label">Ramo:</label>
                <input type="text" name="ramo" id="ramo" class="form-control" required>
            </div>

            <!-- Campo para o Telefone do Fornecedor -->
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone:</label>
                <input type="text" name="telefone" id="telefone" class="form-control" required>
            </div>

            <!-- Campo para o WhatsApp do Fornecedor -->
            <div class="mb-3">
                <label for="whatsapp" class="form-label">Whatsapp:</label>
                <input type="text" name="whatsapp" id="whatsapp" class="form-control">
            </div>

            <!-- Campo para o Email do Fornecedor -->
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <!-- Botões de Ação -->
            <button type="submit" class="btn btn-success mt-3">Cadastrar</button>
            <a href="index.php?page=home" class="btn btn-secondary mt-3">Cancelar</a>
        </form>
    </div>

    <!-- Link para o JS do Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
