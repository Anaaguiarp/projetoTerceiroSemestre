<?php
    session_start();

    if (!isset($_SESSION['administrador'])) {
        header('Location: ../login/login.php');
        exit();
    }

    require_once '../../controller/administradorController.php';
    require_once 'listarAdministradores.php';

    $administradorDao = new AdministradorDao();
    $administradores = $administradorDao->read();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="listagemUsuario.css">
    <link rel="stylesheet" href="../global.css">
    <title>Lista de Administradores</title>
</head>
<body>
    <div class="container-fluid p-0">
    <header><?php require '../header/header.php' ?></header>
        <main class="m-5">
        <h1>Lista de Administradores</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Nome Social</th>
                        <th>E-mail</th>
                        <th>Data de Nascimento</th>
                        <th>Gênero</th>
                        <th>Último Login</th>
                        <th>Conselho Profissional</th>
                        <th>Formação</th>
                        <th>Registro Profissional</th>
                        <th>Especialidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    listarAdministradores($administradores) ?>
                </tbody>
            </table>
        </div>
        </main>
        <footer><?php require '../footer/footer.php' ?></footer>
    </div>
</body>
</html>