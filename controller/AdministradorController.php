<?php

require '../dao/ConnectionFactory.php';
require '../model/Admin.php';
require '../dao/AdministradorDao.php';

$administrador = new Admin();
$administradorDao = new AdministradorDao();
if(isset($_POST['cadastrar'])){
    $paciente->setNome($_POST['nome']);
    $paciente->setEmail($_POST['email']);
    $paciente->setSenha($_POST['senha']);
    $paciente->setDataNascimento($_POST['data_nascimento']);
    $paciente->setGenero($_POST['genero']);
    $paciente->setEstado($_POST['estado']);
    $paciente->setCidade($_POST['cidade']);
    $paciente->setMedicacao($_POST['medicacao']);
    $paciente->setDoenca($_POST['doenca']);
    $pacienteDao->inserir($paciente);
    header("Location: ../loginCadastro.php");
}

?>