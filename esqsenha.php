<?php
$title = "Esqueci a Senha";
$usuario = "Completo Estranho";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/esqsenha.css">
</head>
<body>
    <div class="div_header">
        <header class="d-flex justify-content-between mx-5 align-items-center">
            <h3>Projeto sem nome</h3>
            <nav>
                <ul class="d-flex justify-content-between mb-0 list-unstyled">
                    <li class="mx-3"><a href=# class="text-decoration-none text-reset fw-bold">Home</a></li>
                    <li class="mx-3"><a href=# class="text-decoration-none text-reset fw-bold">Perfil</a></li>
                    <li class="mx-3"><a href=# class="text-decoration-none text-reset fw-bold">Sobre nós</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <main class="d-flex justify-content-center align-items-center">
        <div class="d-flex flex-column align-items-center text-center">
            <h3>Recupere sua senha</h3>
            <p>Insira o e-mail vinculado à sua conta:</p>
            <form class="d-flex flex-column align-items-center text-center">
                <input type="email" placeholder="email@exemplo.com" required class="insert_email mb-4 p-2">
                <button type="submit" class="p-3 fw-bold">Enviar e-mail de recuperação</button>
            </form>
            
        </div>
    </main>
</body>
</html>