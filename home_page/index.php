<?php
$title = "Home";
$usuario = "Completo Estranho";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="div_header">
        <header class="d-flex justify-content-between mx-5 align-items-center">
            <h1>Projeto sem nome</h1>
            <nav>
                <ul class="d-flex justify-content-between mb-0 list-unstyled">
                    <li class="mx-3"><a href=# class="text-decoration-none text-reset fw-bold">Home</a></li>
                    <li class="mx-3"><a href=# class="text-decoration-none text-reset fw-bold">Perfil</a></li>
                    <li class="mx-3"><a href=# class="text-decoration-none text-reset fw-bold">Sobre nós</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <main>
        <div class="row">
            <div class="list_more col-2 d-flex flex-column">
                <ul class="list-unstyled px-4 pt-5">
                    <li class="mb-3"><a href="#" class="text-decoration-none text-reset fw-bold">Artigos</a></li>
                    <li class="mb-3"><a href="#" class="text-decoration-none text-reset fw-bold">Notícias de Saúde</a></li>
                </ul>
            </div>
            <div class="main_content col mt-3 p-0">
                <h3>Olá <?php echo $usuario; ?></h3>
            </div>
            <section class="main_content">
                <div class="row">
                    <div class="col">
                        <h3>Bem-vindo ao Site Saúde!</h3>
                        <p>Aqui, sua dedicação à saúde encontra um espaço feito para facilitar seu dia a dia. Seja para acessar informações, organizar atendimentos ou acompanhar pacientes, queremos que sua experiência seja leve, intuitiva e eficiente.</p>
                        <p>Sinta-se em casa e conte conosco para cuidar de quem mais precisa!</p>
                    </div>
                    <div class="col">
                        <img class="img_inicial" src="../img/laboratorio.jpg" alt="Mulher trabalhando em um laboratório" style="width: 50%">
                    </div>
                </div>
            </section>
        </div>
        
    </main>
</body>
</html>
