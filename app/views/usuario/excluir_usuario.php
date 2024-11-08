<?php
// Caminho absoluto para incluir a classe Usuario
require_once $_SERVER['DOCUMENT_ROOT'] . '/APAE/app/models/Usuario.php';

// Verificar se o ID do usuário foi passado via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Criar uma instância da classe Usuario
    $usuario = new Usuario();

    // Excluir o usuário
    $usuario->excluirUsuario($id);

    // Redirecionar para a página de lista de usuários após a exclusão
    header("Location: listar_usuarios.php");
    exit();
} else {
    die('Usuário não encontrado!');
}
?>
