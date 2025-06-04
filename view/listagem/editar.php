<?php
require_once '../../dao/AdministradorDao.php';
require_once '../../model/Administrador.php';

$dao = new AdministradorDao();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $adm = $dao->buscarPorId($id); // cria essa função no DAO

    if (!$adm) {
        echo "Administrador não encontrado.";
        exit();
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adm = new Administrador();
    $adm->setId($_POST['id']);
    $adm->setNome($_POST['nome']);
    $adm->setNomeSocial($_POST['nome_social']);
    $adm->setEmail($_POST['email']);
    $adm->setSenha(password_hash($_POST['senha'], PASSWORD_DEFAULT));
    $adm->setDataNascimento($_POST['data_nascimento']);
    $adm->setGenero($_POST['genero']);
    $adm->setConselhoProfissional($_POST['conselhoProfissional']);
    $adm->setFormacao($_POST['formacao']);
    $adm->setRegistroProfissional($_POST['registroProfissional']);
    $adm->setEspecialidade($_POST['especialidade']);

    $dao->atualizar($adm); // cria essa função no DAO

    header("Location: listagemUsuario.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../global.css">
    <style>
        body{
            font-family: "Lexend Giga", sans-serif;
        }
    </style>
</head>
<body>
<header><?php require_once ('../header/header.php'); ?></header>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
            <h1 class="text-center mb-4">Informações Pessoais</h1>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $adm->getId() ?>">
                    <div class="mb-2">
                        <label class="form-label">Nome:</label>
                        <input class="form-control" type="text" name="nome" value="<?= $adm->getNome() ?>" required><br>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Nome Social:</label>
                        <input class="form-control" type="text" name="nome_social" value="<?= $adm->getNomeSocial() ?>"><br>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Email:</label>
                        <input class="form-control" type="email" name="email" value="<?= $adm->getEmail() ?>" required><br>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Senha:</label>
                        <input class="form-control" type="password" name="senha" value="<?= $adm->getSenha() ?>" required><br>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Data de Nascimento:</label>
                        <input class="form-control" type="date" name="data_nascimento" value="<?= $adm->getDataNascimento() ?>" required><br>
                    </div>
                    <div class="mb-2">
                        <div class="d-flex gap-3 flex-wrap">
                            <label class="form-label">Gênero:</label><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" value="F" <?= $adm->getGenero() == 'F' ? 'checked' : '' ?> required>
                                <label class="form-check-label">Feminino</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" value="M" <?= $adm->getGenero() == 'M' ? 'checked' : '' ?> required>
                                <label class="form-check-label">Masculino</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="genero" value="O" <?= $adm->getGenero() == 'O' ? 'checked' : '' ?> required>
                                <label class="form-check-label">Outro</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Conselho Profissional:</label>
                        <select class="form-select" name="conselhoProfissional" required>
                            <option value="" <?= $adm->getConselhoProfissional() == '' ? 'selected' : ''  ?>>Selecione...</option>
                            <option value="CRM" <?= $adm->getConselhoProfissional() == 'CRM' ? 'selected' : ''  ?>>CRM - Medicina</option>
                            <option value="COREN" <?= $adm->getConselhoProfissional() == 'COREN' ? 'selected' : ''  ?>>COREN - Enfermagem</option>
                            <option value="CREFITO" <?= $adm->getConselhoProfissional() == 'CREFITO' ? 'selected' : ''  ?>>CREFITO - Fisioterapia/Terapia Ocupacional</option>
                            <option value="CRP" <?= $adm->getConselhoProfissional() == 'CRP' ? 'selected' : ''  ?>>CRP - Psicologia</option>
                            <option value="CRO" <?= $adm->getConselhoProfissional() == 'CRO' ? 'selected' : ''  ?>>CRO - Odontologia</option>
                            <option value="Outros" <?= $adm->getConselhoProfissional() == 'Outros' ? 'selected' : ''  ?>>Outro...</option>
                        </select><br>
                    </div>
                    <div class="mb-2">
                        <label class="form-label mb-2">Formação:</label><br>
                        <?php
                        $formacoes = ['Medicina', 'Enfermagem', 'Fisioterapia', 'Psicologia', 'Odontologia', 'Outro'];
                        foreach ($formacoes as $formacao) {
                        ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="formacao" value="<?= $formacao ?>" <?= $adm->getFormacao() == $formacao ? 'checked' : '' ?> required>
                                <label class="form-check-label"><?= $formacao ?></label>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Registro Profissional:</label>
                        <input class="form-control" type="text" name="registroProfissional" value="<?= $adm->getRegistroProfissional() ?>" required><br>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Especialidade:</label>
                        <input  class="form-control" type="text" name="especialidade" value="<?= $adm->getEspecialidade() ?>"><br>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-warning">Editar Dados</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
<?php require '../footer/footer.php'?>
</body>
</html>