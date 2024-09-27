<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Funcionários</title>
</head>
<body>
<div class="container">
    <h1 class="mt-4">Cadastro de Funcionários</h1>
    
    <form method="POST" action="FuncionarioController.php?action=cadastrar">
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" name="cpf" required>
        </div>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" required>
        </div>
        <div class="form-group">
            <label for="sobrenome">Sobrenome</label>
            <input type="text" class="form-control" name="sobrenome" required>
        </div>
        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" class="form-control" name="data_nascimento" required>
        </div>
        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" name="endereco" required>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" name="telefone" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" name="senha" required>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

    <h2 class="mt-4">Lista de Funcionários</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>CPF</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once '../app/views/funcionario/Funcionario.php';
            $funcionarios = Funcionario::listar();
            foreach ($funcionarios as $funcionario) {
                echo "<tr>
                    <td>{$funcionario['id']}</td>
                    <td>{$funcionario['nome']}</td>
                    <td>{$funcionario['sobrenome']}</td>
                    <td>{$funcionario['cpf']}</td>
                    <td>
                        <a href='FuncionarioController.php?action=excluir&id={$funcionario['id']}' class='btn btn-danger'>Excluir</a>
                        <a href='FuncionarioController.php?action=editar&id={$funcionario['id']}' class='btn btn-warning'>Editar</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
