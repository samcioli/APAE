<?php

// index.php ou outro arquivo de entrada
require_once '../app/controllers/HomeController.php';

$controller = new HomeController();
$controller->index(); // Chama o método index para carregar a página home

// Simule a busca do nome do usuário (você pode substituir pelo nome real do usuário)
$nome_usuario = "Usuário"; // Substitua com o nome do usuário logado, se necessário

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="../css/home.css"> <!-- Link para o arquivo CSS (adicione o seu) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">APAE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <li class="nav-item">
                        <a class="nav-link" a href="../app/views/cotacao/cotacoes_cadastradas.php" >Cotações</a> <!-- Link para o logout -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" a href="../app/views/usuario/listar_usuarios.php" >Funcionarios</a> <!-- Link para o logout -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" a href="../app/views/cardapio/cardapio_view.php" >Cardapio</a> <!-- Link para o logout -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" a href="../app/views/fornecedor/fornecedor_view.php" >Fornecedores</a> <!-- Link para o logout -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" a href="../app/views/relatorio/listar_relatorios.php" >Relatorios</a> <!-- Link para o logout -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">Bem-vindo(a), Admin!</h1>
        <p class="text-center">Você está logado no sistema.</p>
        
        <div class="d-flex justify-content-center">
            <a href="profile.php" class="btn btn-primary me-2">Ver Perfil</a> <!-- Botão para ver o perfil -->
            <a href="logout.php" class="btn btn-danger">Sair</a>
            </div>
            <div class="d-flex justify-content-center">
            <p class="text-center"><br><br>Cadastrar: </p>
            </div>
            <div class="d-flex justify-content-center">
            <a href="cadastro.php">Usuario</a> 
            </div>
            <div class="d-flex justify-content-center">
            <a href="cotacao.php">Cotação</a>
            </div>
            <div class="d-flex justify-content-center">
            <a href="cardapio.php">Cardápio</a>
            </div>
            <div class="d-flex justify-content-center">
            <a href="fornecedor.php">Fornecedor</a>
        </div>
        <div class="d-flex justify-content-center">
            <a href="relatorio.php">Relatório</a>
    </div>

    <footer class="text-center mt-5">
    </footer>
</body>
</html>
