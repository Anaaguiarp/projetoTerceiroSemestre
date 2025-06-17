<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require '../../dao/PacienteDao.php';
    require '../../model/Paciente.php';

    $dao = new PacienteDao();

    // Verifica se veio o ID
    if (!isset($_GET['id'])) {
        echo "ID inválido!";
        exit;
    }

    $paciente = $dao->buscarPorId($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Giga:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="editarPaciente.css">
</head>
    <body>
        <header><?php require '../header/header.php' ?></header>
        <main>
            <h1 class="my-5 text-center">Editar Usuário</h1>
            <form method="post" action="/projeto_integrado/controller/pacienteController.php">
                <div class="mb-3">
                    <input type="hidden" name="acao" value="atualizar">
                    <input class="form-control" type="hidden" name="id" value="<?= $paciente->getId() ?>">  
                </div>
                <div class="mb-3">
                    <label class="form-label">Nome:</label>
                    <input type="text" name="nome" value="<?= htmlspecialchars($paciente->getNome()) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nome Social:</label>
                    <input type="text" name="nome_social" value="<?= htmlspecialchars($paciente->getNomeSocial()) ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($paciente->getEmail()) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nova senha (opcional):</label>
                    <input type="password" name="senha">
                </div>
                <div class="mb-3">
                    <label class="form-label">Data de nascimento:</label>
                    <input type="date" name="data_nascimento" value="<?= $paciente->getDataNascimento() ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Gênero:</label>
                    <input type="text" name="genero" value="<?= htmlspecialchars($paciente->getGenero()) ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Estado:</label>
                    <input type="text" name="estado" value="<?= htmlspecialchars($paciente->getEstado()) ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Cidade:</label>
                    <input type="text" name="cidade" value="<?= htmlspecialchars($paciente->getCidade()) ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Medicação:</label>
                    <input type="text" name="medicacao" value="<?= htmlspecialchars($paciente->getMedicacao()) ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Doença:</label>
                    <input type="text" name="doenca" value="<?= htmlspecialchars($paciente->getDoenca()) ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tipo Sanguíneo:</label>
                    <input type="text" name="tipo_sanguineo" value="<?= htmlspecialchars($paciente->getTipoSanguineo()) ?>">
                </div>
                <button class="btn botao" type="submit">Salvar</button>
            </form>
        </main>
        <footer><?php require '../footer/footer.php' ?></footer>
    </body>
</html>