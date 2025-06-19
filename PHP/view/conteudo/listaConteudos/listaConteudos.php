<?php
    require '../../controller/conteudoController.php';
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
            <h1>Lista de Conteúdos</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Texto</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php listar(); ?>
                </tbody>
            </table>
        </main>
        <footer><?php require '../footer/footer.php' ?></footer>
    </div>
</body>
</html>