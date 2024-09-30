<?php
session_start(); // Certifique-se de iniciar a sessão

// Verifique se uma página específica foi solicitada
$page = isset($_GET['page']) ? $_GET['page'] : 'cadastro'; // Altera aqui para 'cadastro'

// Inclua a lógica do controlador apropriado
switch ($page) {
    case 'cadastro':
        include '../app/controllers/CadastroController.php';
        $controller = new CadastroController();
        $controller->cadastrar();
        break;
    // Adicione outros casos para diferentes páginas, se necessário
    default:
        include '../app/controllers/CadastroController.php';
        $controller = new CadastroController();
        $controller->cadastrar(); // Redireciona para cadastro por padrão
}

?>
