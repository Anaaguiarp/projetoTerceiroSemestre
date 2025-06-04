<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="cadastroAdminStyles.css">
</head>
<body class="bg-light">
<header><?php require_once ('../header/header.php'); ?></header>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <h1 class="text-center mb-4">Informações Pessoais</h1>
                <form action="../../controller/administradorController.php" method="POST">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" name="nome" placeholder="Seu nome completo" maxlength="100" required>
                    </div>
                    <div class="mb-3">
                        <label for="nome_social" class="form-label">Nome social:</label>
                        <input type="text" class="form-control" name="nome_social" placeholder="Nome social (opcional)" maxlength="100">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail:</label>
                        <input type="email" class="form-control" name="email" placeholder="Seu e-mail" required>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha:</label>
                        <input type="password" class="form-control" name="senha" placeholder="Crie uma senha" maxlength="30" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmacao_senha" class="form-label">Confirme sua senha:</label>
                        <input type="password" class="form-control" name="confirmacao_senha" placeholder="Confirme a senha" maxlength="30" required>
                        
                    </div>
                    <div class="mb-3">
                        <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
                        <input type="date" class="form-control" name="data_nascimento">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gênero:</label>
                        <div class="d-flex gap-3 flex-wrap">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" value="F" id="generoF">
                                <label class="form-check-label" for="generoF">Feminino</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" value="M" id="generoM">
                                <label class="form-check-label" for="generoM">Masculino</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" value="O" id="generoO" checked>
                                <label class="form-check-label" for="generoO">Outro</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="conselhoProfissional" class="form-label">Conselho Profissional</label>
                        <select class="form-select" id="conselho" name="conselhoProfissional" required>
                            <option value="">Selecione...</option>
                            <option value="CRM">CRM - Medicina</option>
                            <option value="COREN">COREN - Enfermagem</option>
                            <option value="CREFITO">CREFITO - Fisioterapia/Terapia Ocupacional</option>
                            <option value="CRP">CRP - Psicologia</option>
                            <option value="CRO">CRO - Odontologia</option>
                            <option value="Outros">Outro...</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-2">Formação:</label>
                        <div class="d-flex flex-wrap gap-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="formacao" value="Psicologia" id="psico">
                                <label class="form-check-label" for="psico">Psicologia</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="formacao" value="Enfermagem" id="enf">
                                <label class="form-check-label" for="enf">Enfermagem</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="formacao" value="Fisioterapia" id="fisio">
                                <label class="form-check-label" for="fisio">Fisioterapia</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="formacao" value="Medicina" id="med">
                                <label class="form-check-label" for="med">Medicina</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="formacao" value="Outro" id="outro">
                                <label class="form-check-label" for="outro">Outro</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="registroProfissional" class="form-label">Número do Registro Profissional</label>
                        <input type="text" class="form-control" name="registroProfissional" placeholder="Ex: 123456/SP" required>
                    </div>
                    <div class="mb-4">
                        <label for="especialidade" class="form-label">Especialidade/Área de Estudo: </label>
                        <input type="text" class="form-control" name="especialidade">
                    </div>
                    <div class="d-grid">
                        <input type="submit" class="btn btn-secondary" name="cadastrar" value="Editar Dados">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require '../footer/footer.php'?>
</body>
</html>