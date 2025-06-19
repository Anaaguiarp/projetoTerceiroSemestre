<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cadastrar'])) {
    if ($_POST['senha'] !== $_POST['confirmacao_senha']) {
        echo "As senhas não coincidem.";
        exit();
    }

    $dados = [
        "nome" => $_POST['nome'],
        "nome_social" => $_POST['nome_social'],
        "email" => $_POST['email'],
        "senha" => $_POST['senha'],
        "confirmacao_senha" => $_POST['confirmacao_senha'],
        "data_nascimento" => $_POST['data_nascimento'],
        "genero" => $_POST['genero'],
        "conselho_profissional" => $_POST['conselho_profissional'],
        "formacao" => $_POST['formacao'],
        "registro_profissional" => $_POST['registro_profissional'],
        "especialidade" => $_POST['especialidade']
    ];

    $json = json_encode($dados);
    $ch = curl_init('http://localhost:3001/administrador');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']);

    $resposta = curl_exec($ch);
    $erro = curl_error($ch);
    curl_close($ch);

    if ($erro) {
        echo "Erro ao enviar para API: $erro";
    } else {
        echo "Administrador inserido com sucesso pela API!";
    }

    exit();
}
?>