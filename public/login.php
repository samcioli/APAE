<?php
session_start();

$erro = ''; // Inicializa a variável de erro

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Inclui os controladores necessários
    require_once '../app/controllers/AdminController.php';
    require_once '../app/controllers/FuncionarioController.php';
    require_once '../app/controllers/NutricionistaController.php';

    // Obtenha os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $role = $_POST['role'];

    // Verifica se a função é 'admin'
    if ($role === 'admin') {
        $adminController = new AdminController();
        // Tenta fazer login
        if ($adminController->login($email, $senha)) {
            // Login bem-sucedido
            $_SESSION['user_id'] = $adminController->getAdminId($email); // Armazena o ID do admin na sessão
            header("Location: public/home.php");
            exit();
        } else {
            $erro = "Credenciais inválidas!";
            error_log("Erro no login do Admin: Email: $email");
        }
    }
    
    // Lógica para Funcionário
    elseif ($role === 'funcionario') {
        $funcionarioController = new FuncionarioController();
        // Tenta fazer login
        if ($funcionarioController->login($email, $senha)) {
            // Login bem-sucedido
            $_SESSION['user_id'] = $funcionarioController->getFuncionarioId($email); // Armazena o ID do funcionário na sessão
            header("Location: public/home.php");
            exit();
        } else {
            $erro = "Credenciais inválidas!";
            error_log("Erro no login do Funcionário: Email: $email");
        }
    }

    // Lógica para Nutricionista
    elseif ($role === 'nutricionista') {
        $nutricionistaController = new NutricionistaController();
        // Tenta fazer login
        if ($nutricionistaController->login($email, $senha)) {
            // Login bem-sucedido
            $_SESSION['user_id'] = $nutricionistaController->getNutricionistaId($email); // Armazena o ID do nutricionista na sessão
            header("Location: public/home.php");
            exit();
        } else {
            $erro = "Credenciais inválidas!";
            error_log("Erro no login do Nutricionista: Email: $email");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/IndexPublic.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="text-center mb-4">
        <img src="../img/LogoAnimado.gif" alt="Logo" class="logo img-fluid">
    </div>
    <form method="post" action="login.php">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required>
        <label for="role">Função:</label>
        <select name="role" required>
            <option value="admin">Admin</option>
            <option value="funcionario">Funcionário</option>
            <option value="nutricionista">Nutricionista</option>
        </select>
        <br><br>
        <button type="submit">Entrar</button>
        <br><br>
        <a href="../public/cadastro.php" class="btn btn-primary">Cadastrar</a>
    </form>

    <?php if ($erro): ?>
        <div class="alert alert-danger mt-3"><?php echo $erro; ?></div>
    <?php endif; ?>
</body>
</html>
