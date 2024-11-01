<?php

// Verifique se uma página específica foi solicitada
$page = isset($_GET['page']) ? $_GET['page'] : 'home'; // Ajuste aqui para 'home'

// Inclua a lógica do controlador apropriado
switch ($page) {
    case 'cadastrar':
        include '../app/controllers/CadastroController.php';
        $controller = new CadastroController();
        $controller->cadastrar();
        break;

    case 'cadastrar_cotacao': // Para o cadastro de cotações
        include '../app/controllers/CotacaoController.php';
        $controller = new CotacaoController();
        $controller->cadastrar();
        break;

    case 'home':
        include 'home.php'; // Adicione sua página home
        break;

    default:
        include 'home.php'; // Redireciona para home por padrão
}
?>
