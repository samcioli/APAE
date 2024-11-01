<?php
include_once '../app/models/Admin.php';

class AdminController {
    // Método para login de administrador
    public function login($email, $senha) {
        $admin = Admin::buscarPorEmail($email);
        if ($admin && password_verify($senha, $admin->senha)) { // Verifica a senha
            $_SESSION['admin_id'] = $admin->id; // Salva a sessão do admin
            return true; // Autenticação bem-sucedida
        }
        return false; // Falha na autenticação
    }

    // Listar todos os administradores
    public static function listar() {
        return Admin::listar(); // Chama o método listar da classe Admin
    }

    // Cadastrar um novo administrador
    public static function cadastrar($dados) {
        $admin = new Admin();
        $admin->setCpf($dados['cpf']);
        $admin->setNome($dados['nome']);
        $admin->setSobrenome($dados['sobrenome']);
        $admin->setDataNascimento($dados['data_nascimento']);
        $admin->setEndereco($dados['endereco']);
        $admin->setTelefone($dados['telefone']);
        $admin->setEmail($dados['email']);
        $admin->setSenha($dados['senha']); // A senha deve ser hashada no setter
        return $admin->salvar(); // Chama o método salvar da classe Admin
    }

    // Editar um administrador existente
    public static function editar($id, $dados) {
        $admin = new Admin($id);
        $admin->setCpf($dados['cpf']);
        $admin->setNome($dados['nome']);
        $admin->setSobrenome($dados['sobrenome']);
        $admin->setDataNascimento($dados['data_nascimento']);
        $admin->setEndereco($dados['endereco']);
        $admin->setTelefone($dados['telefone']);
        $admin->setEmail($dados['email']);
        // Não atualizar a senha se não for fornecida
        if (!empty($dados['senha'])) {
            $admin->setSenha($dados['senha']);
        }
        return $admin->atualizar(); // Chama o método atualizar da classe Admin
    }

    // Excluir um administrador
    public static function excluir($id) {
        return Admin::excluir($id); // Chama o método excluir da classe Admin
    }

    // Buscar um administrador por ID
    public static function buscar($id) {
        return Admin::buscar($id); // Chama o método buscar da classe Admin
    }
}
?>
