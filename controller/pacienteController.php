<?php

require __DIR__. '../dao/ConnectionFactory.php';
require __DIR__. '../model/Pessoa.php';
require __DIR__. '../model/Paciente.php';
require __DIR__. '../dao/PacienteDao.php';

$pacienteDao = new PacienteDao();
if(isset($_POST['cadastrar'])){
    $paciente = new Paciente();
    $paciente->setNome($_POST['nome']);
    $paciente->setEmail($_POST['email']);
    $paciente->setSenha($_POST['senha']);
    $paciente->setDataNascimento($_POST['data_nascimento']);
    $paciente->setGenero($_POST['genero']);
    $paciente->setEstado($_POST['estado']);
    $paciente->setCidade($_POST['cidade']);
    $paciente->setMedicacao($_POST['medicacao']);
    $paciente->setDoenca($_POST['doenca']);
    $paciente->setTipoSanguineo($_POST['tipo_sanguineo']);
    $pacienteDao->inserir($paciente);
    header("Location: ../loginCadastro.php"); // ?????????????????
}

function listar(){
    $pacienteDao = new PacienteDao();
    $lista = $pacienteDao->read();
    foreach($lista as $pac){
        echo "<tr>
        <td> {$pac->getId()} </td>
        <td> {$pac->getNome()}</td>
        <td> {$pac->getEmail()}</td>
        <td> {$pac->getDataNascimento()}</td>
        <td> {$pac->getGenero()}</td>
        <td> {$pac->getEstado()}</td>
        <td> {$pac->getCidade()}</td>
        <td> {$pac->getMedicacao()}</td>
        <td> {$pac->getDoenca()}</td>
        <td> {$pac->getTipoSanguineo()}</td>
        <td> <a href='index.php?editar={$pac->getId()}'> <i class='bi bi-pencil-square'></i> Editar</a> <a href='#'> Exluir</a> </td>
    </tr>";
    }
}

?>