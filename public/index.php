<?php
// Defina a constante para o diretório base
define('BASE_PATH', dirname(__DIR__));

// Inclua os arquivos necessários
require_once BASE_PATH . '/models/Admin.php';
require_once BASE_PATH . '/models/Funcionario.php';
require_once BASE_PATH . '/models/Nutricionista.php';
require_once BASE_PATH . '/models/Cotacao.php';
require_once BASE_PATH . '/models/Fornecedor.php';
require_once BASE_PATH . '/models/Cardapio.php';
require_once BASE_PATH . '/models/Produto.php';

require_once BASE_PATH . '/controllers/AdminController.php';
require_once BASE_PATH . '/controllers/FuncionarioController.php';
require_once BASE_PATH . '/controllers/NutricionistaController.php';
require_once BASE_PATH . '/controllers/CotacaoController.php';
require_once BASE_PATH . '/controllers/FornecedorController.php';
require_once BASE_PATH . '/controllers/CardapioController.php';
require_once BASE_PATH . '/controllers/ProdutoController.php';

// Obtenha a entidade, ação e ID da URL
$entity = isset($_GET['entity']) ? $_GET['entity'] : 'produto';
$action = isset($_GET['action']) ? $_GET['action'] : 'gerenciar';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Mapeie entidades para controladores
$controllers = [
    'admin' => AdminController::class,
    'funcionario' => FuncionarioController::class,
    'nutricionista' => NutricionistaController::class,
    'cotacao' => CotacaoController::class,
    'fornecedor' => FornecedorController::class,
    'cardapio' => CardapioController::class,
    'produto' => ProdutoController::class,
];

// Verifique se o controlador existe
if (array_key_exists($entity, $controllers)) {
    $controller = new $controllers[$entity]();
    
    // Chame o método apropriado com base na ação
    switch ($action) {
        case 'cadastrar':
            $controller->cadastrar();
            break;

        case 'gerenciar':
            $controller->gerenciar();
            break;

        case 'excluir':
            if ($id) {
                $controller->excluir($id);
            }
            break;

        case 'editar':
            if ($id) {
                $controller->editar($id);
            }
            break;

        default:
            $controller->gerenciar();
            break;
    }
} else {
    // Redireciona para uma página de erro ou gerenciar padrão
    echo "Entidade não encontrada!";
}
?>
