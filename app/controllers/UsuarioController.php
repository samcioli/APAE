<?php
require_once '../app/models/Usuario.php';

class UsuarioController {
    public function listarUsuarios() {
        $filtroRole = isset($_GET['role']) ? $_GET['role'] : null; // Obtém o filtro da URL (ex: ?role=admin)
        
        $usuarioModel = new Usuario();
        $usuarios = $usuarioModel->buscarUsuariosPorRole($filtroRole);

        include '../public/listar_usuarios.php'; // Inclui a view
    }
}
?>
