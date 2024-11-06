<?php
// Verifique se uma página específica foi solicitada
$page = isset($_GET['page']) ? $_GET['page'] : 'home'; // Ajuste aqui para 'home'

switch ($page) {
    case 'cadastrar':
        include '../app/controllers/CadastroController.php';
        $controller = new CadastroController();
        $controller->cadastrar();
        break;

    case 'cadastrar_cotacao':
        include '../app/controllers/CotacaoController.php';
        $controller = new CotacaoController();
        $controller->cadastrar();
        break;

    case 'editar_cotacao':
        include '../app/controllers/CotacaoController.php';
        $controller = new CotacaoController();
        $controller->editar();
        break;

    case 'editar_cotacao_action':
        include '../app/controllers/CotacaoController.php';
        $controller = new CotacaoController();
        $controller->atualizar();
        break;

    case 'home':
        include 'home.php'; // Adicione sua página home
        break;

    default:
        include 'home.php'; // Redireciona para home por padrão
}
?>
