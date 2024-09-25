<?php
require_once '../models/Nutricionista.php';
require_once '../models/Cardapio.php';

class NutricionistaController {

    // Método para cadastrar um novo nutricionista
    public function cadastrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nutricionista = new Nutricionista();
            $nutricionista->setCpf($_POST['cpf']);
            $nutricionista->setCrn($_POST['crn']);
            $nutricionista->setNome($_POST['nome']);
            $nutricionista->setSobrenome($_POST['sobrenome']);
            $nutricionista->setDataNascimento($_POST['data_nascimento']);
            $nutricionista->setEndereco($_POST['endereco']);
            $nutricionista->setTelefone($_POST['telefone']);
            $nutricionista->setEmail($_POST['email']);
            $nutricionista->setSenha(password_hash($_POST['senha'], PASSWORD_DEFAULT));
            $nutricionista->cadastrar();
            header("Location: gerenciar.php");
            exit();
        }
        include '../views/nutricionista/cadastro.php';
    }

    // Método para listar todos os nutricionistas
    public function listar() {
        $nutricionistas = Nutricionista::listar();
        include '../views/nutricionista/listar.php';
    }

    // Método para editar um nutricionista
    public function editar($id) {
        $nutricionista = Nutricionista::buscarPorId($id);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nutricionista->setCpf($_POST['cpf']);
            $nutricionista->setCrn($_POST['crn']);
            $nutricionista->setNome($_POST['nome']);
            $nutricionista->setSobrenome($_POST['sobrenome']);
            $nutricionista->setDataNascimento($_POST['data_nascimento']);
            $nutricionista->setEndereco($_POST['endereco']);
            $nutricionista->setTelefone($_POST['telefone']);
            $nutricionista->setEmail($_POST['email']);
            if (!empty($_POST['senha'])) {
                $nutricionista->setSenha(password_hash($_POST['senha'], PASSWORD_DEFAULT));
            }
            $nutricionista->atualizar();
            header("Location: gerenciar.php");
            exit();
        }
        include '../views/nutricionista/editar.php';
    }

    // Método para excluir um nutricionista
    public function excluir($id) {
        Nutricionista::excluir($id);
        header("Location: gerenciar.php");
        exit();
    }

    // Método para gerenciar cardápios
    public function gerenciarCardapio() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cardapio = new Cardapio();
            $cardapio->setNomePrato($_POST['nome_prato']);
            $cardapio->setIngredientes($_POST['ingredientes']);
            $cardapio->setValorNutricional($_POST['valor_nutricional']);
            $cardapio->setDataValidade($_POST['data_validade']);
            $cardapio->cadastrar();
            header("Location: listar_cardapios.php");
            exit();
        }
        include '../views/nutricionista/cadastrar_cardapio.php';
    }

    // Método para listar todos os cardápios
    public function listarCardapios() {
        $cardapios = Cardapio::listar();
        include '../views/nutricionista/listar_cardapios.php';
    }
}
?>
