<?php

require '../dao/ConnectionFactory.php';
require '../model/Pessoa.php';
require '../dao/PessoaDao.php';

$pessoa = new Pessoa();
$pessoaDao = new PessoaDao();
if(isset($_POST['cadastrar'])){
    $pessoa->setNome($_POST['nome']);
    $pessoa->setEmail($_POST['email']);
    $pessoa->setSenha($_POST['senha']);
    $pessoa->setDataNascimento($_POST['data_nascimento']);
    $pessoa->setGenero($_POST['genero']);
    $pessoaDao->inserir($pessoa);
    header("Location: ../loginCadastro.php");
}

?>