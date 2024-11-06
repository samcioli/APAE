<?php
// Incluir o arquivo de configuração para conectar ao banco de dados
include('config.php');

// Criar uma instância da classe Database
$database = new Database();
$conn = $database->getConnection();

// Verificar se o ID foi passado
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Preparar a consulta para excluir a cotação
    $sql = "DELETE FROM cotacoes WHERE id = :id";

    // Preparar a declaração
    $stmt = $conn->prepare($sql);

    // Vincular o ID à consulta
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Executar a consulta de exclusão
    if ($stmt->execute()) {
        // Redirecionar para a página de listagem de cotações com uma mensagem de sucesso
        header("Location: listar_cotacoes.php?mensagem=excluida");
        exit();
    } else {
        // Caso haja erro, redirecionar para a página de listagem com uma mensagem de erro
        header("Location: listar_cotacoes.php?mensagem=erro");
        exit();
    }
} else {
    // Caso o ID não tenha sido passado, redirecionar para a lista
    header("Location: listar_cotacoes.php");
    exit();
}
?>
