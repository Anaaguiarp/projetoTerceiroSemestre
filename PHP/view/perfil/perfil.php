

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
        <link rel="stylesheet" href="perfil.css">
        <link rel="stylesheet" href="../global.css">
    </head>
    <body>
        <div class="container-fluid p-0">
            <header><?php require '../header/header.php' ?></header>
            <main>
                <h1 class="my-5 text-center">Informações Pessoais</h1>
                <div class="info-pessoal">
                    <div class="perfil-item mb-3">
                        <p class="tipo-dado">Nome Completo:</p>
                        <p class="dado">
                            <?php echo !empty($paciente['nome']) ? htmlspecialchars($paciente['nome']) : 'Nome não informado';
                            ?>
                        </p>
                    </div>
                    <div class="perfil-item mb-3">
                        <p class="tipo-dado">Nome Social:</p>
                        <p class="dado">
                            <?php echo !empty($paciente['nome_social']) ? htmlspecialchars($paciente['nome_social']) : 'Não informado';
                            ?>
                        </p>
                    </div>
                    <div class="perfil-item mb-3">
                        <p class="tipo-dado">E-mail:</p>
                        <p class="dado">
                            <?php echo !empty($paciente['email']) ? htmlspecialchars($paciente['email']) : 'Email não informado';
                            ?>
                        </p>
                    </div>
                    <div class="perfil-item mb-3">
                        <p class="tipo-dado">Data de Nascimento:</p>
                        <p class="dado">
                            <?php echo !empty($paciente['data_nascimento']) ? htmlspecialchars($paciente['data_nascimento']) : 'Não informado';
                            ?>
                        </p>
                    </div>
                    <div class="perfil-item mb-3">
                        <div>
                            <p class="tipo-dado">Estado</p>
                            <p class="dado">
                                <?php echo !empty($paciente['estado']) ? htmlspecialchars($paciente['estado']) : 'Estado não informado';
                                ?>
                            </p>
                        </div>
                        <div>
                            <p class="tipo-dado">Cidade</p>
                            <p class="dado">
                                <?php echo !empty($paciente['cidade']) ? htmlspecialchars($paciente['cidade']) : 'Cidade não informada';
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="perfil-item mb-3">
                        <p class="tipo-dado">Gênero:</p>
                        <p class="dado">
                            <?php
                                if($paciente['genero'] === 'F') {
                                    echo 'Feminino';
                                }elseif ($paciente['genero'] === 'M') {
                                    echo 'Masculino';
                                }elseif ($paciente['genero'] === 'O') {
                                    echo 'Outro';
                                }else {
                                    echo 'Não informado';
                                }
                            ?>
                        </p>
                    </div>
                    <div class="perfil-item mb-3">
                        <p class="tipo-dado">Tipo Sanguíneo:</p>
                        <p class="dado">
                            <?php
                                $tiposSanguineos = [
                                    'A+' => 'A+',
                                    'A-' => 'A-',
                                    'B+' => 'B+',
                                    'B-' => 'B-',
                                    'AB+' => 'AB+',
                                    'AB-' => 'AB-',
                                    'O+' => 'O+',
                                    'O-' => 'O-'
                                ];
                                echo $tiposSanguineos[$paciente['tipo_sanguineo']] ?? 'Não informado';
                            ?>
                        </p>
                    </div>
                    <div class="perfil-item mb-3">
                        <p class="tipo-dado">Medicação:</p>
                        <p class="dado">
                            <?php echo !empty($paciente['medicacao']) ? htmlspecialchars($paciente['medicacao']) : 'Nenhuma medicação informada';
                            ?>
                        </p>
                    </div>
                    <div class="perfil-item mb-3">
                        <p class="tipo-dado">Doenças:</p>
                        <p class="dado">
                            <?php echo !empty($paciente['doencas']) ? nl2br(htmlspecialchars($paciente['doencas'])) : 'Nenhuma doença ou alergia informada';?>
                        </p>
                    </div>
                </div>
            </main>
            <footer><?php require '../footer/footer.php' ?></footer>
        </div>
    </body>
</html>