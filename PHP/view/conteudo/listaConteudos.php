<?php
    require '../../controller/conteudoController.php';
    $categoria = $_GET['categoria'] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conteúdos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="../global.css">
</head>
<body>
        <header><?php require '../header/header.php' ?></header>
        <main class="m-5">
            <h1>Conteúdos</h1>
            <div class="my-3">
                <?php if ($categoria): ?>
                    <p class="text-muted">Filtrando por: <strong><?= ucfirst(str_replace('_', ' ', $categoria)) ?></strong></p>
                <?php endif; ?>

                <?php /* DEVERIA APARECER SE FOSSE ADM LOGADO if (isset($_SESSION['admin'])): */ ?>
                    <a href="conteudo.php" class="btn btn-success mb-3">Novo Conteúdo</a>
                <?php /* endif; */ ?>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <?php /* if ($_SESSION['admin']) : */ ?>
                            <th>Id</th>
                        <?php /* endif; */ ?>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Texto</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php listar(); ?>
                </tbody>
            </table>
        </main>
        <footer><?php require '../footer/footer.php' ?></footer>
</body>
</html>