<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();

    require '../../controller/conteudoController.php';
    $categoria = $_GET['categoria'] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conteúdos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="listaConteudos.css">
</head>
<body>
    <header><?php require '../header/header.php' ?></header>

    <main class="container my-5">
        <h1 class="mb-4">Conteúdos</h1>

        <?php if ($categoria): ?>
            <p class="text-muted">Filtrando por: <strong><?= ucfirst(str_replace('_', ' ', $categoria)) ?></strong></p>
        <?php endif; ?>

        <div class="mb-4 categorias">
            <a href="?categoria=dores" class="btn btn-sm me-2">Dores</a>
            <a href="?categoria=cansaco" class="btn btn-sm me-2">Cansaço</a>
            <a href="?categoria=fraqueza" class="btn btn-sm me-2">Fraqueza</a>
            <a href="?categoria=falta_de_apetite" class="btn btn-sm me-2">Falta de Apetite</a>
            <a href="listaConteudos.php" class="btn btn-outline-secondary btn-sm">Ver Todos</a>
        </div>

        <?php if (isset($_SESSION['administrador'])): ?>
            <div class="mb-4">
                <a href="conteudo.php" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Novo Conteúdo
                </a>
            </div>
        <?php endif; ?>

        <!-- Grid de Cards -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php listarComoCards($categoria); ?>
        </div>
    </main>

    <footer><?php require '../footer/footer.php' ?></footer>
</body>
</html>
