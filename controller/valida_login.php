<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    session_start();

    require __DIR__ . '/../dao/ConnectionFactory.php';
    require __DIR__ . '/../dao/PacienteDao.php';
    require __DIR__ . '/../model/Paciente.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        $pacienteDao = new PacienteDao();
        $paciente = $pacienteDao->buscarPorEmail($email);

        if ($paciente && password_verify($senha, $paciente->getSenha())) {
            $_SESSION['paciente'] = [
                'id' => $paciente->getId(),
                'nome' => $paciente->getNome(),
                'nome_social' => $paciente->getNomeSocial(),
                'email' => $paciente->getEmail(),
                'data_nascimento' => $paciente->getDataNascimento(),
                'estado' => $paciente->getEstado(),
                'cidade' => $paciente->getCidade(),
                'genero' => $paciente->getGenero(),
                'tipo_sanguineo' => $paciente->getTipoSanguineo(),
                'medicacao' => $paciente->getMedicacao(),
                'doencas' => $paciente->getDoenca()
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
