<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    session_start();

    require __DIR__ . '/../dao/ConnectionFactory.php';
    require __DIR__ . '/../dao/PacienteDao.php';
    require __DIR__ . '/../model/Paciente.php';

    require __DIR__ . '/../dao/AdministradorDao.php';
    require __DIR__ . '/../model/Administrador.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        $pacienteDao = new PacienteDao();
        $adminDao = new AdministradorDao();
        $paciente = $pacienteDao->buscarPorEmail($email);
        $administrador = $adminDao->buscarPorEmail($email);

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
        }elseif($administrador && password_verify($senha, $administrador->getSenha())){
            $_SESSION['admin'] = [
                'id' => $administrador->getId(),
                'nome' => $administrador->getNome(),
                'email' => $administrador->getEmail()
            ];
            $_SESSION['sucesso'] = 'Login de administrador realizado com sucesso!';
            header('Location: ../view/listagem/listagemUsuarios.php');
            exit();
        } else {
            $_SESSION['erro'] = 'E-mail ou senha inválidos.';
            header('Location: ../view/login/login.php');
            exit();
        }
    }
?>