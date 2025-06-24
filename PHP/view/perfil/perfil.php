<?php
require_once __DIR__ . '/../../dao/PacienteDao.php';
/*
$paciente = null;

if (isset($_GET['editar'])) {
    $id = $_GET['editar'];
    $dao = new PacienteDao();
    $p = $dao->buscarPorId($id);

    if ($p) {
        $paciente = [
            'id' => $p->getId(),
            'nome' => $p->getNome(),
            'nome_social' => $p->getNomeSocial(),
            'email' => $p->getEmail(),
            'data_nascimento' => $p->getDataNascimento(),
            'estado' => $p->getEstado(),
            'cidade' => $p->getCidade(),
            'genero' => $p->getGenero(),
            'tipo_sanguineo' => $p->getTipoSanguineo(),
            'medicacao' => $p->getMedicacao(),
            'doencas' => $p->getDoenca()
        ];
    }
}*/
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="perfil.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>
    <div class="container p-4">
        <h1 class="mb-4">Editar Perfil</h1>
        <form method="POST" action="../../controller/pacienteController.php">
            <input type="hidden" name="id" value="<?= $paciente['id'] ?>">
            <input type="hidden" name="salvar-edicao" value="1">
            <div class="mb-3">
                <label>Nome Completo:</label>
                <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($paciente['nome']) ?>">
            </div>
            <div class="mb-3">
                <label>Nome Social:</label>
                <input type="text" name="nome_social" class="form-control" value="<?= htmlspecialchars($paciente['nome_social']) ?>">
            </div>
            <div class="mb-3">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($paciente['email']) ?>">
            </div>
            <div class="mb-3">
                <label>Data de Nascimento:</label>
                <input type="date" name="data_nascimento" class="form-control" value="<?= htmlspecialchars($paciente['data_nascimento']) ?>">
            </div>
            <div class="mb-3">
                <label>Estado:</label>
                <input type="text" name="estado" class="form-control" value="<?= htmlspecialchars($paciente['estado']) ?>">
            </div>
            <div class="mb-3">
                <label>Cidade:</label>
                <input type="text" name="cidade" class="form-control" value="<?= htmlspecialchars($paciente['cidade']) ?>">
            </div>
            <div class="mb-3">
                <label>Gênero:</label>
                <select name="genero" class="form-select">
                    <option value="F" <?= $paciente['genero'] === 'F' ? 'selected' : '' ?>>Feminino</option>
                    <option value="M" <?= $paciente['genero'] === 'M' ? 'selected' : '' ?>>Masculino</option>
                    <option value="O" <?= $paciente['genero'] === 'O' ? 'selected' : '' ?>>Outro</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Tipo Sanguíneo:</label>
                <select name="tipo_sanguineo" class="form-select">
                    <?php
                        $tipos = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
                        foreach ($tipos as $tipo) {
                            $selected = $paciente['tipo_sanguineo'] === $tipo ? 'selected' : '';
                            echo "<option value=\"$tipo\" $selected>$tipo</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Medicação:</label>
                <textarea name="medicacao" class="form-control"><?= htmlspecialchars($paciente['medicacao']) ?></textarea>
            </div>
            <div class="mb-3">
                <label>Doenças:</label>
                <textarea name="doenca" class="form-control"><?= htmlspecialchars($paciente['doencas']) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>