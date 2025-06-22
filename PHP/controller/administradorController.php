<?php
    require __DIR__ . '/../dao/ConnectionFactory.php';
    require __DIR__ . '/../model/Pessoa.php';
    require __DIR__ . '/../model/Administrador.php';
    require __DIR__ . '/../dao/AdministradorDao.php';

    $administrador = new Administrador();
    $administradorDao = new AdministradorDao();
    
    if(isset($_POST['cadastrar'])){
        $administrador->setNome($_POST['nome']);
        $administrador->setNomeSocial($_POST['nome_social']);
        $administrador->setEmail($_POST['email']);
        $administrador->setSenha($_POST['senha']);
        $administrador->setDataNascimento($_POST['data_nascimento']);
        $administrador->setGenero($_POST['genero']);
        $administrador->setConselhoProfissional($_POST['conselho_profissional']);
        $administrador->setFormacao($_POST['formacao']);
        $administrador->setRegistroProfissional($_POST['registro_profissional']);
        $administrador->setEspecialidade($_POST['especialidade']);

        $administradorDao->inserir($administrador);
        header("Location: ../view/listagem/listagemAdm.php");
    }

        if(isset($_GET['editar'])){
        $idAdministrador = $_GET['editar'];
        $administrador = $administradorDao->buscarPorId($idAdministrador);
        
        if(!$administrador->getId()){
            header("Location: ../index.php?erro=nao_encontrado");
            exit();
        }
    }

    if(isset($_POST['salvar-edicao'])){
        $administrador = new Administrador();
        $administrador->setNome($_POST['nome']);
        $administrador->setNomeSocial($_POST['nome_social']);
        $administrador->setEmail($_POST['email']);
        $senhaTexto = $_POST['senha'];
            if(!empty($senhaTexto)){
                $senhaHash = password_hash($senhaTexto, PASSWORD_DEFAULT);
                $administrador->setSenha($senhaHash);
            } else {
                $senhaAntiga = $administradorDao->buscarPorId($_POST['id'])->getSenha();
                $administrador->setSenha($senhaAntiga);
            }
        $administrador->setDataNascimento($_POST['data_nascimento']);
        $administrador->setGenero($_POST['genero']);
        $administrador->setConselhoProfissional($_POST['conselho_profissional']);
        $administrador->setFormacao($_POST['formacao']);
        $administrador->setRegistroProfissional($_POST['registro_profissional']);
        $administrador->setEspecialidade($_POST['especialidade']);

        $administradorDao->editar($administrador);
        
        header('Location: ../view/listagem/listagemAdm.php');
        exit();
    }
?>