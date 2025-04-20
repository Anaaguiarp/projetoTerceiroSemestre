<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Giga:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="container-fluid p-0">
        <header>
            <?php
                require_once ('../header/header.php');
            ?>
        </header>
        <div class="container-header-img">
            <h1 class="titulo m-0">Cuidados paliativos</h1>
        </div>
        <div class="container-nav p-3">
            <p class="m-0">Eu sinto:</p>
            <nav class="navbar navbar-expand-lg p-0">
                <ul class="navbar-nav d-flex justify-content-evenly w-100 pb-4">
                    <li class="nav-item"><a href="#" class="nav-link py-0 text-light">Dores</a></li>
                    <li class="nav-item"><a href="#" class="nav-link py-0 text-light">Cansaço</a></li>
                    <li class="nav-item"><a href="#" class="nav-link py-0 text-light">Fraqueza</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-light py-0 ">Falta de Apetite</a></li>
                </ul>
            </nav>
        </div>
        <div class="container-definicao d-flex align-items-center justify-content-between mt-5">
            <div class="mx-5 px-3" style="width: 40%; border-left: 5px solid #131C63">
                <h2 class="mb-3" style="font-weight: bolder;">O que é Cuidado Paliativo?</h2>
                <p class="m-0" style="color: #131C63;">
                    Cuidados paliativos são um conjunto de práticas voltadas para melhorar a qualidade de vida de pacientes com doenças graves ou incuráveis.<br><br>
                    O foco não é a cura, mas o alívio do sofrimento, controle da dor e apoio emocional para o paciente e sua família.<br><br>
                    Esse tipo de cuidado pode ser oferecido em qualquer fase da doença, junto a outros tratamentos, e envolve uma equipe multidisciplinar que inclui médicos, enfermeiros, psicólogos e assistentes sociais.
                </p>
            </div>
            <img src="../img/4.jpg" alt="Homem sendo vacinado no braço por uma enfermeira feliz" class="ms-5 img-fluid rounded-start" style="width: 40%; box-shadow: 1px 4px 10px #474749;">
        </div>
            <div id="bordaHome" class="mt-5 container-fluid p-3 card-header text-center text-white">
                <h2>Nosso objetivo</h2>
                <p>
                    Nosso site tem como propósito oferecer informações confiáveis e acessíveis sobre cuidados paliativos. 
                    Sabemos como é importante entender quando esse tipo de cuidado deve ser considerado, por isso reunimos conteúdos que ajudam a esclarecer dúvidas, dar orientações e facilitar a tomada de decisão.
                </p>
            </div>
            <div class="mt-5 d-flex align-items-center justify-content-between">
                <img src="../img/1.jpg" alt="" class="img-fluid rounded-end" style="width: 500px; height: auto;">
                <div class="ms-5">
                    <p>
                        Se você ou alguém próximo precisa de cuidados paliativos, saiba que esse tipo de assistência é voltado para <strong>proporcionar conforto, qualidade de vida e apoio integral, tanto para o paciente quanto para a família.</strong>
                    </p>
                    <p>
                        Os cuidados paliativos podem ser indicados em diversas situações, especialmente em doenças graves ou progressivas, quando o foco passa a ser o bem-estar e o alívio dos sintomas.
                    </p>
                </div>
            </div>
            <div class="mt-5">
                <footer id="bordaHome" >
                    <?php
                        require_once ('../footer/footer.php');
                    ?>
                </footer>
            </div>
    </div>
   
</body>
</html>