<?php
include_once '../app/models/Admin.php';

class AdminController {
    // Método para login de administrador
    public function login($email, $senha) {
        $admin = Admin::buscarPorEmail($email);
        if ($admin && password_verify($senha, $admin['senha'])) {
            // Autenticação bem-sucedida
            $_SESSION['admin_id'] = $admin['id']; // Salva a sessão do admin
            return true;
        }
        return false; // Falha na autenticação
    }

    // Listar todos os administradores
    public static function listar() {
        return Admin::listar();
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
        $admin->setSenha($dados['senha']); // A senha já será hashada no setter
        return $admin->salvar();
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
        return $admin->atualizar();
    }

    // Excluir um administrador
    public static function excluir($id) {
        return Admin::excluir($id);
    }

    // Buscar um administrador por ID
    public static function buscar($id) {
        return Admin::buscar($id);
    }
}
?>
