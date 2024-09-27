<?php
class DashboardController {
    public function index() {
        include '../app/views/dashboard.php'; // Inclui a view do dashboard
    }
}

// Executa o controlador
$controller = new DashboardController();
$controller->index();
?>
