<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../dao/PacienteDao.php';
require '../../model/Paciente.php';

$dao = new PacienteDao();

// Verifica se veio o ID
if (!isset($_GET['id'])) {
    echo "ID inválido!";
    exit;
}

$paciente = $dao->buscarPorId($_GET['id']);
?>

<form method="post" action="/projeto_integrado/controller/pacienteController.php">
    <input type="hidden" name="acao" value="atualizar">
    <input type="hidden" name="id" value="<?= $paciente->getId() ?>">
    
    <label>Nome:</label>
    <input type="text" name="nome" value="<?= htmlspecialchars($paciente->getNome()) ?>" required><br>

    <label>Nome Social:</label>
    <input type="text" name="nome_social" value="<?= htmlspecialchars($paciente->getNomeSocial()) ?>"><br>

    <label>Email:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($paciente->getEmail()) ?>" required><br>

    <label>Nova senha (opcional):</label>
    <input type="password" name="senha"><br>

    <label>Data de nascimento:</label>
    <input type="date" name="data_nascimento" value="<?= $paciente->getDataNascimento() ?>"><br>

    <label>Gênero:</label>
    <input type="text" name="genero" value="<?= htmlspecialchars($paciente->getGenero()) ?>"><br>

    <label>Estado:</label>
    <input type="text" name="estado" value="<?= htmlspecialchars($paciente->getEstado()) ?>"><br>

    <label>Cidade:</label>
    <input type="text" name="cidade" value="<?= htmlspecialchars($paciente->getCidade()) ?>"><br>

    <label>Medicação:</label>
    <input type="text" name="medicacao" value="<?= htmlspecialchars($paciente->getMedicacao()) ?>"><br>

    <label>Doença:</label>
    <input type="text" name="doenca" value="<?= htmlspecialchars($paciente->getDoenca()) ?>"><br>

    <label>Tipo Sanguíneo:</label>
    <input type="text" name="tipo_sanguineo" value="<?= htmlspecialchars($paciente->getTipoSanguineo()) ?>"><br>

    <button type="submit">Salvar</button>
</form>
