<?php
session_start();

require __DIR__ . '/../dao/ConnectionFactory.php';
require __DIR__ . '/../dao/PacienteDao.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $pacienteDao = new PacienteDao();
    $paciente = $pacienteDao->buscarPorEmail($email); // você precisa ter esse método no PacienteDao

    if ($paciente && password_verify($senha, $paciente->getSenha())) {
        // Login válido
        $_SESSION['usuario'] = [
            'id' => $paciente->getId(),
            'nome' => $paciente->getNome(),
            'email' => $paciente->getEmail()
        ];
        $_SESSION['sucesso'] = 'Login realizado com sucesso!';
        header('Location: ../view/homePage/index.php');
        exit();
    } else {
        $_SESSION['erro'] = 'E-mail ou senha inválidos.';
        header('Location: ../view/login/login.php');
        exit();
    }
}
?>
