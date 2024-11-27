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

    case 'cadastrar_relatorio': // Novo case para cadastro de relatório
        include '../app/controllers/RelatorioController.php'; // Inclui o controlador de Relatório
        $controller = new RelatorioController();
        $controller->cadastrar(); // Chama a função cadastrar do controlador
        break;

    case 'cadastrar_cardapio': // Novo case para cadastro de cardápio
        include '../app/controllers/CardapioController.php'; // Inclui o controlador de Cardápio
        $controller = new CardapioController();
        $controller->cadastrar(); // Chama a função cadastrar do controlador
        break;

    case 'cadastrar_fornecedor': // Novo case para cadastro de fornecedor
        include '../app/controllers/FornecedorController.php'; // Inclui o controlador de Fornecedor
        $controller = new FornecedorController();
        $controller->cadastrar(); // Chama a função cadastrar do controlador
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
