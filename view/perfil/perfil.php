<?php
    session_start();

    if (!isset($_SESSION['usuario'])) {
        header('Location: ../login/login.php');
        exit();
    }

    $paciente = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Giga:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container-fluid p-0">
        <header><?php require '../header/header.php' ?></header>
        <main class="mt-5">
            <h1>Perfil</h1>
            <div class="perfil-item mb-3">
                <p>Nome Completo:</p>
                <p class="dado"><?php echo htmlspecialchars($paciente['nome']); ?></p>
            </div>
            <div class="perfil-item mb-3">
                <p>Nome Social:</p>
                <p class="dado">
                    <?php
                        echo !empty($paciente['nome_social']) 
                            ? htmlspecialchars($paciente['nome_social']) 
                            : 'Não informado';
                    ?>
                </p>
            </div>
            <div class="perfil-item mb-3">
                <p>E-mail:</p>
                <p class="dado"><?php echo htmlspecialchars($paciente['email']); ?></p>
            </div>
            <div class="perfil-item mb-3">
                <p>Data de Nascimento:</p>
                <p class="dado">
                    <?php
                        echo !empty($paciente['data_nascimento']) 
                            ? htmlspecialchars($paciente['data_nascimento']) 
                            : 'Não informado';
                    ?>
                </p>
            </div>
            <div class="perfil-item mb-3">
                <div>
                    <p>Estado</p>
                    <p class="dado">
                        <?php
                            echo !empty($paciente['estado']) 
                                ? htmlspecialchars($paciente['estado']) 
                                : 'Não informado';
                        ?>
                    </p>
                </div>
                <div>
                    <p>Cidade</p>
                    <p class="dado">
                        <?php
                            echo !empty($paciente['cidade']) 
                                ? htmlspecialchars($paciente['cidade']) 
                                : 'Não informado';
                        ?>
                    </p>
                </div>
            </div>
            <div class="perfil-item mb-3">
                <p>Gênero:</p>
                <p class="dado">
                    <?php
                        if ($paciente['genero'] === 'F') {
                            echo 'Feminino';
                        } elseif ($paciente['genero'] === 'M') {
                            echo 'Masculino';
                        } elseif ($paciente['genero'] === 'O') {
                            echo 'Outro';
                        } else {
                            echo 'Não informado';
                        }
                    ?>
                </p>
            </div>
            <div class="perfil-item mb-3">
                <p>Tipo Sanguíneo:</p>
                <p class="dado">
                    <?php
                        $tiposSanguineos = [
                            'A+' => 'A positivo',
                            'A-' => 'A negativo',
                            'B+' => 'B positivo',
                            'B-' => 'B negativo',
                            'AB+' => 'AB positivo',
                            'AB-' => 'AB negativo',
                            'O+' => 'O positivo',
                            'O-' => 'O negativo'
                        ];
                        echo $tiposSanguineos[$paciente['tipo_sanguineo']] ?? 'Não informado';
                    ?>
                </p>
            </div>
            <div class="perfil-item mb-3">
                <p>Medicação:</p>
                <p class="dado">
                    <?php
                        echo !empty($paciente['medicacao']) 
                            ? htmlspecialchars($paciente['medicacao']) 
                            : 'Não informado';
                    ?>
                </p>
            </div>
            <div class="perfil-item mb-3">
                <p>Doenças:</p>
                <p class="dado">
                    <?php
                        echo !empty($paciente['doencas']) 
                            ? nl2br(htmlspecialchars($paciente['doencas'])) 
                            : 'Não informado';
                    ?>
                </p>
            </div>
        </main>
    </div>
</body>
</html>