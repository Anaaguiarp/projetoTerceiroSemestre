<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../dao/ConnectionFactory.php';
require __DIR__ . '/../model/Administrador.php';
require __DIR__ . '/../dao/AdministradorDao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cadastrar'])) {
    if ($_POST['senha'] !== $_POST['confirmacao_senha']) {
        echo "As senhas não coincidem.";
        exit();
    }

    $administradorDao = new AdministradorDao();

    $administrador = new Administrador();
    $administrador->setNome($_POST['nome']);
    $administrador->setNomeSocial($_POST['nome_social']);
    $administrador->setEmail($_POST['email']);
    $senhaCriptografada = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $administrador->setSenha($senhaCriptografada);
    $administrador->setDataNascimento($_POST['data_nascimento']);
    $administrador->setGenero($_POST['genero']);
    $administrador->setUltimoLogin($_POST['ultimoLogin']);
    $administrador->setConselhoProfissional($_POST['conselhoProfissional']);
    $administrador->setFormacao($_POST['formacao']);
    $administrador->setRegistroProfissional($_POST['registroProfissional']);
    $administrador->setEspecialidade($_POST['especialidade']);

    $resultado = $administradorDao->inserir($administrador);

    if ($resultado) {
        echo "Administrador inserido com sucesso!";
    } else {
        echo "Falha na inserção.";
    }
    exit();
}
?>