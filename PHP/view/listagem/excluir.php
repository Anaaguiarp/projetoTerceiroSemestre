<?php
require_once '../../dao/AdministradorDao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $dao = new AdministradorDao();
    $dao->deletar($id); // cria esse método no DAO

    header("Location: listagemUsuario.php"); // redireciona de volta à lista
    exit();
} else {
    echo "ID não informado.";
}
?>