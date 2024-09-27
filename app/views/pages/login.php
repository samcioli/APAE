<?php
session_start();
// Verifica se o usuário já está logado
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css"> <!-- Adicione seu CSS aqui -->
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="index.php">
        <label for="role">Função:</label>
        <select name="role" required>
            <option value="admin">Admin</option>
            <option value="funcionario">Funcionário</option>
            <option value="nutricionista">Nutricionista</option>
        </select>
        
        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>
