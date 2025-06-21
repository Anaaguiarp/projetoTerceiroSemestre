<?php
    require '../../controller/conteudoController.php';

    if (!isset($_GET['id'])) { // Se não houver essa requisição com 1 id válido, redireciona o usuário para a Página de Conteúdos
        header("Location: listaConteudos.php");
        exit;
    }

    $id = $_GET['id'];
    $conteudo = $conteudoDao->buscarPorId($id);

    if (!$conteudo || !$conteudo->getId()) {
        echo "<p>Conteúdo não encontrado.</p>";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($conteudo->getTitulo()) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header><?php require '../header/header.php'; ?></header>
    <main class="container my-5">
        <h1><?= htmlspecialchars($conteudo->getTitulo()) ?></h1>
        <p class="text-muted"><?= date('d/m/Y', strtotime($conteudo->getData())) ?></p>
        <p><strong><?= htmlspecialchars($conteudo->getDescricao()) ?></strong></p>
        <div class="mt-4">
            <p><?= nl2br(htmlspecialchars($conteudo->getTexto())) ?></p>
        </div>
        <a href="listaConteudos.php" class="btn btn-secondary mt-4">Voltar</a>
    </main>
    <footer><?php require '../footer/footer.php'; ?></footer>
</body>
</html>