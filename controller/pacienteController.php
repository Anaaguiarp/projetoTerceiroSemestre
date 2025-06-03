<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../dao/ConnectionFactory.php';
require __DIR__ . '/../model/Pessoa.php';
require __DIR__ . '/../model/Paciente.php';
require __DIR__ . '/../dao/PacienteDao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cadastrar'])) {
    $senha = $_POST['senha'];
    $confirmaSenha = $_POST['confirma_senha'];

    if ($senha !== $confirmaSenha) {
        session_start();
        $_SESSION['erro'] = 'As senhas não coincidem.';
        header('Location: ../view/cadastro/cadastro.php'); // ou o caminho correto da view
        exit();
    }

    $pacienteDao = new PacienteDao();

    $paciente = new Paciente();
    $paciente->setNome($_POST['nome']);
    $paciente->setNomeSocial($_POST['nome_social']);
    $paciente->setEmail($_POST['email']);
    $senhaCriptografada = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $paciente->setSenha($senhaCriptografada);
    $paciente->setDataNascimento($_POST['data_nascimento']);
    $paciente->setGenero($_POST['genero']);
    $paciente->setEstado($_POST['estado']);
    $paciente->setCidade($_POST['cidade']);
    $paciente->setMedicacao($_POST['medicacao']);
    $paciente->setDoenca($_POST['doenca']);
    $paciente->setTipoSanguineo($_POST['tipo_sanguineo']);

    $resultado = $pacienteDao->inserir($paciente);

    session_start();
    if ($resultado) {
        $_SESSION['sucesso'] = 'Paciente inserido com sucesso!';
        header('Location: ../view/homePage/index.php');
    } else {
        $_SESSION['erro'] = 'Falha na inserção.';
        header('Locatiom: ../view/cadastro/cadastro.php');
    }

    exit();
}

function listar() {
    $pacienteDao = new PacienteDao();
    $lista = $pacienteDao->read();
    foreach ($lista as $pac) {
        echo "<tr class=\"mb-4\">
            <td>{$pac->getId()}</td>
            <td>{$pac->getNome()}</td>
            <td>{$pac->getNomeSocial()}</td>
            <td>{$pac->getEmail()}</td>
            <td>{$pac->getDataNascimento()}</td>
            <td>{$pac->getGenero()}</td>
            <td>{$pac->getEstado()}</td>
            <td>{$pac->getCidade()}</td>
            <td>{$pac->getMedicacao()}</td>
            <td>{$pac->getDoenca()}</td>
            <td>{$pac->getTipoSanguineo()}</td>
            <td>
                <a href='index.php?editar={$pac->getId()}'>
                    <i class='bi bi-pencil-square'></i> Editar
                </a>
                <a href='#'>Excluir</a>
            </td>
        </tr>";
    }
}
?>