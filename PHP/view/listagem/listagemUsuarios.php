<?php
    require '../../controller/pacienteController.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="listagemUsuario.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>
    <div class="container-fluid p-0">
        <header><?php require '../header/header.php' ?></header>
        <main class="m-5">
            <h1>Lista de Usuários</h1>
            <table class="table table-striped">
                <thead>
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
        </main>
        <footer><?php require '../footer/footer.php' ?></footer>
    </div>
</body>
</html>