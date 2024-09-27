<?php
session_start();

// Defina a constante para o diretório base
define('BASE_PATH', dirname(__DIR__));

// Inclua os arquivos necessários
require_once BASE_PATH . '/app/models/Admin.php';
require_once BASE_PATH . '/app/models/Cardapio.php';
require_once BASE_PATH . '/app/models/Cotacao.php';
require_once BASE_PATH . '/app/models/Fornecedor.php';
require_once BASE_PATH . '/app/models/Funcionario.php';
require_once BASE_PATH . '/app/models/Nutricionista.php';
require_once BASE_PATH . '/app/models/Produto.php';

require_once BASE_PATH . '/app/controllers/HomeController.php'; 
require_once BASE_PATH . '/app/controllers/AdminController.php';
require_once BASE_PATH . '/app/controllers/CardapioController.php';
require_once BASE_PATH . '/app/controllers/CotacaoController.php';
require_once BASE_PATH . '/app/controllers/FornecedorController.php';
require_once BASE_PATH . '/app/controllers/FuncionarioController.php';
require_once BASE_PATH . '/app/controllers/NutricionistaController.php';
require_once BASE_PATH . '/app/controllers/ProdutoController.php';
require_once BASE_PATH . '/app/controllers/LoginController.php'; // Inclua o controlador de login

// Verifica se o usuário já está logado
if (isset($_SESSION['user_id'])) {
    header("Location: home.php"); // Redireciona para home.php
    exit();
}

// Se o usuário não estiver logado, mostra a página de login
include BASE_PATH . '/app/views/pages/login.php'; // Inclui a página de login
exit();

// Obtenha a função, email e senha da URL
$role = isset($_GET['role']) ? strtolower($_GET['role']) : null;
$email = isset($_GET['email']) ? $_GET['email'] : null;
$senha = isset($_GET['senha']) ? $_GET['senha'] : null;

// Verifique se a função foi passada
if (!$role) {
    include BASE_PATH . '/app/views/pages/login.php'; // Inclui a página de login
    exit;
}

// Mapeie entidades para controladores
$controllers = [
    'admin' => AdminController::class,
    'funcionario' => FuncionarioController::class,
    'nutricionista' => NutricionistaController::class,

];

// Verifique se o controlador existe
if (array_key_exists($role, $controllers)) {
    $controller = new $controllers[$role]();
    
    // Aqui você deve implementar a lógica de autenticação
    if ($controller->login($email, $senha)) {
        // Redirecione para home.php após o login
        header("Location: public/home.php");
        exit();
    } else {
        echo "Credenciais inválidas!";
        include BASE_PATH . 'public/login.php'; // Inclui a página de login novamente
    }
} else {
    echo "Função não encontrada!";
}

?>
