<?php
    require '../../dao/AdministradorDao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="listagemUsuario.css">
    <title>Lista de Administradores</title>
</head>
<body>
    <div>
        <header><?php require '../header/header.php' ?></header>
        <h1 class="mt-2">Lista de Administradores</h1>
        <table class="table table-stripped">
            <thead>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Data de Nascimento</th>
                <th>Último Login</th>
                <th>Conselho Profissional</th>
                <th>Formação</th>
                <th>Registro Profissional</th>
                <th>Especialidade</th>
            </thead>
            <tbody>
                <?php
                    require 'listarAdministradores.php';
                    listarAdministradores();
                ?>
            </tbody>
        </table>
        
    </div>
</body>
</html>