<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação de Conteúdo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../global.css">
</head>
<body class="bg-light">
<header><?php require_once ('../header/header.php'); ?></header>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <h1 class="text-center mb-4">Adicionar Conteúdo</h1>
                <form action="../../controller/administradorController.php" method="POST">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título:</label>
                        <input type="text" class="form-control" name="titulo" placeholder="Digite o título da publicação" maxlength="100" required>
                    </div>
                    <div class="mb-3">
                        <label for="conteudo" class="form-label">Conteúdo</label><br>
                        <textarea class="form-control" placeholder="Digite o conteúdo que deseja publicar" id="exampleFormControlTextarea1" rows="14" maxlength="2000" required></textarea>
                    </div>
                    <div class="d-grid">
                        <input type="submit" class="btn btn-secondary" name="publicar" value="Publicar">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require '../footer/footer.php'?>
</body>
</html>