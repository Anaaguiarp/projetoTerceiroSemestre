<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Página Inicial</title>
</head>
<body>
    <header>
            <?php
            require_once ('../header/header.php');
            ?>
    </header>
    <div class="text-center">
        <img class="img-fluid" src="../img/3.2.jpg" alt="">
    </div>
    <div>
        <nav>
            <div id="bordaHome" class="container-fluid p-3 d-flex justify-content-between card-header text-white">
                <p>Eu sinto: </p>
                <p>Dores</p>
                <p>Cansaço</p>
                <p>Fraqueza</p>
                <p>Falta de Apetite</p>
            </div>
        </nav>
    </div>
    <div class="container mt-5">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="mb-2">O que é Cuidado Paliativo?</h2>
                <p class="m-0">
                    Cuidados paliativos são um conjunto de práticas voltadas para melhorar a qualidade de vida de pacientes com doenças graves ou incuráveis.
                    O foco não é a cura, mas o alívio do sofrimento, controle da dor e apoio emocional para o paciente e sua família.
                    Esse tipo de cuidado pode ser oferecido em qualquer fase da doença, junto a outros tratamentos, e envolve uma equipe multidisciplinar que inclui médicos, enfermeiros, psicólogos e assistentes sociais.
                </p>
            </div>
            <img src="../img/4.jpg" alt="" class="ms-5 img-fluid rounded-start" style="width: 500px; height: auto;">
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