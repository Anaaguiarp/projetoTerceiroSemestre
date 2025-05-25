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
    <link rel="stylesheet" href="cadastroStyles.css">
</head>
<body>
    <div class="container-fluid p-0">
        <header><?php require_once ('../header/header.php'); ?></header>
        <main class="mt-5">
            <section class="d-flex flex-column justify-content-center w-50 mx-auto">
                <h1 class="my-5 text-center">Informações Pessoais</h1>
                <div class="border rounded p-4">
                    <form action="../../controller/pacienteController.php" method="post">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" name="nome" placeholder="Seu nome completo" maxlength="100" required>
                        </div>
                        <div class="mb-3">
                            <label for="nome_social" class="form-label">Nome Social</label>
                            <input type="text" class="form-control" name="nome_social" placeholder="Apelido ou nome social" maxlength="100">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" name="email" placeholder="Seu email" maxlength="120" required>
                        </div>
                        <div class="mb-3">
                            <label for="senha" class="form-label">Sua senha</label>
                            <input type="password" class="form-control" name="senha" placeholder="Crie uma senha" maxlength="30" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirma_senha" class="form-label">Confirme sua senha</label>
                            <input type="text" class="form-control" name="confirma_senha" placeholder="Confirme sua senha" maxlength="30" required>
                        </div>
                        <div class="mb-3">
                            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control" name="data_nascimento">
                        </div>
                        <div class="d-flex">
                            <div class="mb-3">
                                <label for="estado" class="form-label">Estado</label>
                                <input type="text" class="form-control" name="estado" maxlength="25">
                            </div>
                            <div class="mb-3 mx-3">
                                <label for="estado" class="form-label">Cidade</label>
                                <input type="text" class="form-control" name="estado" maxlength="30">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <p class="label-genero">Gênero</p>
                            <div class="d-flex justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genero" value="F">
                                    <label class="form-check-label" for="genero">
                                        Feminino
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genero" value="M">
                                    <label class="form-check-label" for="genero">
                                        Masculino
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genero" value="O" checked>
                                    <label class="form-check-label" for="genero">
                                        Outro
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <p class="label-genero">Tipo sanguíneo</p>
                            <div class="d-flex justify-content-around">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sangue" value="A+">
                                    <label class="form-check-label" for="sangue">
                                        A+
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sangue" value="B+">
                                    <label class="form-check-label" for="sangue">
                                        B+
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sangue" value="AB+" checked>
                                    <label class="form-check-label" for="sangue">
                                        AB+
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sangue" value="O+" checked>
                                    <label class="form-check-label" for="sangue">
                                        O+
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-around">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sangue" value="A-">
                                    <label class="form-check-label" for="sangue">
                                        A-
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sangue" value="B-">
                                    <label class="form-check-label" for="sangue">
                                        B-
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sangue" value="AB-" checked>
                                    <label class="form-check-label" for="sangue">
                                        AB-
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sangue" value="O-" checked>
                                    <label class="form-check-label" for="sangue">
                                        O-
                                    </label>
                                </div>
                            </div>
                        </div> 
                        <div class="mb-3">
                            <label for="medicacao" class="form-label">Medicação</label>
                            <textarea class="form-control" name="medicacao" placeholder="Exemplo: Remédio 30mg, Remédio 15mg" rows="5" maxlength="500"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="doenca" class="form-label">Doenças ou Condições de Saúde</label>
                            <textarea class="form-control" name="doenca" placeholder="Informe suas condições de saúde" rows="5" maxlength="500"></textarea>
                        </div>
                        <button class="btn btn-primary">Salvar informações</button>
                    </form>
                </div>
            </section>
        </main> 
    </div>
</body>
</html>