<?php
    session_start();

    if (!isset($_SESSION['administrador'])) {
        header('Location: ../login/login.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../global.css">
</head>
<body>
    <?php require_once '../header/header.php'; ?>
    <main class="container my-5">
        <h1 class="mb-4">Área de Administração</h1>

        <div class="row g-4">
            <div class="col-6">
                <a href="../listagem/listagemAdm.php" class="text-decoration-none">
                    <div class="card border-primary h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title">Administradores</h5>
                            <p class="card-text">Visualizar e gerenciar administradores cadastrados no sistema.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6">
                <a href="../listagem/listagemUsuarios.php" class="text-decoration-none">
                    <div class="card border-success h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title">Pacientes</h5>
                            <p class="card-text">Visualizar e gerenciar todos os pacientes registrados.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </main>
    <?php require_once '../footer/footer.php'; ?>
</body>
</html>
