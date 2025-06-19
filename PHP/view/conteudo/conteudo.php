<?php
    require '../../controller/conteudoController.php';
?>
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
                <form action="../../controller/conteudoController.php" method="POST">
                    <input type="hidden" name="id" value="<?= isset($conteudo) && $conteudo->getId() ? $conteudo->getId() : '' ?>" >
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título:</label>
                        <input type="text" class="form-control" name="titulo" placeholder="Digite o título da publicação" maxlength="100" value="<?= isset($conteudo) && $conteudo->getTitulo() ? $conteudo->getTitulo() : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição:</label>
                        <input type="text" class="form-control" name="descricao" placeholder="Crie uma descrição para seu post" maxlength="300" value="<?= isset($conteudo) && $conteudo->getDescricao() ? $conteudo->getDescricao() : '' ?>"  required>
                    </div>
                    <div class="mb-3">
                        <label for="texto" class="form-label">Conteúdo:</label><br>
                        <textarea class="form-control" placeholder="Digite o conteúdo que deseja publicar" name="texto" id="exampleFormControlTextarea1" rows="14" maxlength="5000" required><?= isset($conteudo) && $conteudo->getTexto() ? $conteudo->getTexto() : '' ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="data" class="form-label">Data: (Vou arrumar)</label><br>
                        <input type="date" class="form-control" name="data" value="<?= isset($conteudo) && $conteudo->getData() ? $conteudo->getData() : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Onde melhor se encaixa?</label>
                        <select name="categoria" class="form-select" required>
                            <option value="">Selecione uma categoria</option>
                            <option value="dores" <?= isset($conteudo) && $conteudo->getCategoria() === 'dores' ? 'selected' : '' ?>>Dores</option>
                            <option value="cansaco" <?= isset($conteudo) && $conteudo->getCategoria() === 'cansaco' ? 'selected' : '' ?>>Cansaço</option>
                            <option value="fraqueza" <?= isset($conteudo) && $conteudo->getCategoria() === 'fraqueza' ? 'selected' : '' ?>>Fraqueza</option>
                            <option value="falta_de_apetite" <?= isset($conteudo) && $conteudo->getCategoria() === 'falta_de_apetite' ? 'selected' : '' ?>>Falta de apetite</option>
                        </select>
                    </div>
                    <div class="d-grid">
                        <?php if(isset($conteudo) && $conteudo->getId()): ?>
                            <button type="submit" name="salvar-edicao" class="btn btn-primary">Salvar Edição</button>
                        <?php else: ?>
                            <button type="submit" name="publicar" class="btn btn-success">Cadastrar</button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer><?php require '../footer/footer.php'?></footer>
</body>
</html>