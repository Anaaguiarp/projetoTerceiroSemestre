<?php
    session_start();
    if (!isset($_SESSION['administrador'])) {
        header('Location: ../login/login.php');
        exit();
    }
    require '../../controller/pacienteController.php'; // nao excluir se for usar a API para listar, só comente aqui para depois eu utilizar meu PHP/Banco 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="listagemUsuario.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>
    <header>
        <?php require '../header/header.php' ?>
    </header>

    <main class="container my-5">
        <h1 class="mb-4">Lista de Usuários</h1>

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead">
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Nome Social</th>
                        <th>E-mail</th>
                        <th>Data de Nascimento</th>
                        <th>Gênero</th>
                        <th>Estado</th>
                        <th>Cidade</th>
                        <th>Medicações</th>
                        <th>Doenças</th>
                        <th>Tipo Sanguíneo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php listarSQL(); ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer>
        <?php require '../footer/footer.php' ?>
    </footer>
</body>
</html>
