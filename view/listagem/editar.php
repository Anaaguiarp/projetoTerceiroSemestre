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
    $adm->setSenha($_POST['senha']);
    $adm->setDataNascimento($_POST['data_nascimento']);
    $adm->setGenero($_POST['genero']);
    $adm->setConselhoProfissional($_POST['conselhoProfissional']);
    $adm->setFormacao($_POST['formacao']);
    $adm->setRegistroProfissional($_POST['registroProfissional']);
    $adm->setEspecialidade($_POST['especialidade']);

    // adicione os demais setters conforme necessário

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
</head>
<body>
    <h1>Editar Administrador</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?= $adm->getId() ?>">

        <label>Nome:</label>
        <input type="text" name="nome" value="<?= $adm->getNome() ?>" required><br>

        <label>Nome Social:</label>
        <input type="text" name="nome_social" value="<?= $adm->getNomeSocial() ?>"><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?= $adm->getEmail() ?>" required><br>

        <label>Senha:</label>
        <input type="password" name="senha" value="<?= $adm->getSenha() ?>" required><br>

        <label>Data de Nascimento:</label>
        <input type="date" name="data_nascimento" value="<?= $adm->getDataNascimento() ?>" required><br>

        <label>Gênero:</label>
        <select name="genero" required>
            <option value="F" <?= $adm->getGenero() == 'F' ? 'selected' : '' ?>>Feminino</option>
            <option value="M" <?= $adm->getGenero() == 'M' ? 'selected' : '' ?>>Masculino</option>
            <option value="O" <?= $adm->getGenero() == 'O' ? 'selected' : '' ?>>Outro</option>
        </select><br>

        <label>Conselho Profissional:</label>
        <input type="text" name="conselhoProfissional" value="<?= $adm->getConselhoProfissional() ?>" required><br>

        <label>Formação:</label>
        <input type="text" name="formacao" value="<?= $adm->getFormacao() ?>" required><br>

        <label>Registro Profissional:</label>
        <input type="text" name="registroProfissional" value="<?= $adm->getRegistroProfissional() ?>" required><br>

        <label>Especialidade:</label>
        <input type="text" name="especialidade" value="<?= $adm->getEspecialidade() ?>"><br>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>