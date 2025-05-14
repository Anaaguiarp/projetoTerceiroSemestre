<?php

require '../dao/ConnectionFactory.php';
require '../model/Administrador.php';
require '../dao/AdministradorDao.php';

$administrador = new Administrador();
$administradorDao = new AdministradorDao();
if(isset($_POST['cadastrar'])){
    $administrador->setNome($_POST['nome']);
    $administrador->setEmail($_POST['email']);
    $administrador->setSenha($_POST['senha']);
    $administrador->setDataNascimento($_POST['data_nascimento']);
    $administrador->setGenero($_POST['genero']);
    $administrador->setUmtimoLogin($_POST['ultimoLogin']);
    $administrador->setDocumento($_POST['documento']);
    $administrador->setFormacao($_POST['formacao']);
    $administrador->setEspecialidade($_POST['especialidade']);
    $pacienteDao->inserir($paciente);
    header("Location: ../loginCadastro.php");
}

?>