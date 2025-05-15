<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="cadastroStyles.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h2>Informações Pessoais</h2>
                <form action="formulario.php" method="get">
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
                        <label for="estado" class="form-label">Estado</label>
                        <input type="text" class="form-control" name="estado" maxlength="25">
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Cidade</label>
                        <input type="text" class="form-control" name="estado" maxlength="30">
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
            <div class="col"></div>
        </div>
    </div>
</body>
</html>