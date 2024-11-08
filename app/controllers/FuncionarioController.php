<?php
include_once '../app/models/Funcionario.php';

class FuncionarioController {
    // Método para login de funcionário
    public function login($email, $senha) {
        $funcionario = Funcionario::buscarPorEmail($email);
        if ($funcionario && password_verify($senha, $funcionario->senha)) { // Verifica a senha
            $_SESSION['funcionario_id'] = $funcionario->id; // Salva a sessão do funcionário
            return true; // Autenticação bem-sucedida
        }
        return false; // Falha na autenticação
    }

    // Listar todos os funcionários
    public static function listar() {
        return Funcionario::listar(); // Chama o método listar da classe Funcionario
    }

    // Cadastrar um novo funcionário
    public static function cadastrar($dados) {
        $funcionario = new Funcionario();
        $funcionario->setCpf($dados['cpf']);
        $funcionario->setNome($dados['nome']);
        $funcionario->setSobrenome($dados['sobrenome']);
        $funcionario->setDataNascimento($dados['data_nascimento']);
        $funcionario->setEndereco($dados['endereco']);
        $funcionario->setTelefone($dados['telefone']);
        $funcionario->setEmail($dados['email']);
        $funcionario->setSenha($dados['senha']); // A senha deve ser hashada no setter
        return $funcionario->salvar(); // Chama o método salvar da classe Funcionario
    }

    // Editar um funcionário existente
    public static function editar($id, $dados) {
        $funcionario = new Funcionario($id);
        $funcionario->setCpf($dados['cpf']);
        $funcionario->setNome($dados['nome']);
        $funcionario->setSobrenome($dados['sobrenome']);
        $funcionario->setDataNascimento($dados['data_nascimento']);
        $funcionario->setEndereco($dados['endereco']);
        $funcionario->setTelefone($dados['telefone']);
        $funcionario->setEmail($dados['email']);
        // Não atualizar a senha se não for fornecida
        if (!empty($dados['senha'])) {
            $funcionario->setSenha($dados['senha']);
        }
        return $funcionario->atualizar(); // Chama o método atualizar da classe Funcionario
    }

    // Excluir um funcionário
    public static function excluir($id) {
        return Funcionario::excluir($id); // Chama o método excluir da classe Funcionario
    }

    // Buscar um funcionário por ID
    public static function buscar($id) {
        return Funcionario::buscar($id); // Chama o método buscar da classe Funcionario
    }
}
?>
