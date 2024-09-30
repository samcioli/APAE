<?php

require_once 'config.php';

class Home {
    // Exemplo de propriedades
    private $titulo;
    private $mensagem;

    public function __construct() {
        // Defina valores padrão
        $this->titulo = "Bem-vindo à Página Inicial!";
        $this->mensagem = "Esta é a sua aplicação MVC.";
    }

    // Método para obter o título
    public function getTitulo() {
        return $this->titulo;
    }

    // Método para obter a mensagem
    public function getMensagem() {
        return $this->mensagem;
    }

    // Você pode adicionar mais métodos conforme necessário
}
?>
