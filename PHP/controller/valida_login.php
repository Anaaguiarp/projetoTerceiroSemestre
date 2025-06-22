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

    // Descomente a linha abaixo se quiser ativar login de paciente!!!!!!!!!!!!!!!!!
    // $paciente = $pacienteDao->buscarPorEmail($email);
    $paciente = null; // Para evitar erro de variável indefinida

    $administrador = $adminDao->buscarPorEmail($email);

    // Verifica login de paciente (DESATIVADO por enquanto)
    if ($paciente !== null && password_verify($senha, $paciente->getSenha())) {
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
    }

    // Verifica login de administrador
    if ($administrador !== null && password_verify($senha, $administrador->getSenha())) {
        $_SESSION['administrador'] = [
            'id' => $administrador->getId(),
            'nome' => $administrador->getNome(),
            'nome_social' => $administrador->getNomeSocial(),
            'email' => $administrador->getEmail(),
            'data_nascimento' => $administrador->getDataNascimento(),
            'genero' => $administrador->getGenero(),
            'ultimo_login' => $administrador->getUltimoLogin(), 
            'conselho_profissional' => $administrador->getConselhoProfissional(),
            'formacao' => $administrador->getFormacao(),
            'registro_profissional' => $administrador->getRegistroProfissional(),
            'especialidade' => $administrador->getEspecialidade()
        ];
        $_SESSION['sucesso'] = 'Login realizado com sucesso!';
        header('Location: ../view/listagem/listagemUsuarios.php');
        exit();
    }

    // Se nenhum login funcionar
    $_SESSION['erro'] = 'E-mail ou senha inválidos.';
    header('Location: ../view/login/login.php');
    exit();
}
?>