<?php

require_once 'config.php';

session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php'); // Redireciona para a tela de login se não estiver logado
    exit();
}

echo "<h1>Bem-vindo, " . $_SESSION['usuario']['nome'] . "!</h1>";
echo "<a href='logout.php'>Sair</a>"; // Link para logout
?>
