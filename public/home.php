<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redireciona se não estiver logado
    exit();
}

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
            <a class="navbar-brand" href="#">Sistema</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Perfil</a> <!-- Link para a página de perfil -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Sair</a> <!-- Link para o logout -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">Bem-vindo(a), <?php echo htmlspecialchars($nome_usuario); ?>!</h1>
        <p class="text-center">Você está logado no sistema.</p>
        
        <div class="d-flex justify-content-center">
            <a href="profile.php" class="btn btn-primary me-2">Ver Perfil</a> <!-- Botão para ver o perfil -->
            <a href="logout.php" class="btn btn-danger">Sair</a> <!-- Botão para logout -->
        </div>
    </div>

    <footer class="text-center mt-5">
        <p>&copy; 2024 Seu Sistema. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
