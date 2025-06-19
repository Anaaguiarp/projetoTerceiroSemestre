<?php
    require __DIR__ . '/../dao/ConnectionFactory.php';
    require __DIR__ . '/../dao/ConteudoDao.php';
    require __DIR__ . '/../model/Conteudo.php';

    $conteudoDao = new ConteudoDao();

    if(isset($_POST['publicar'])){
        $conteudo = new Conteudo();
        $conteudo->setTitulo($_POST['titulo']);
        $conteudo->setDescricao($_POST['descricao']);
        $conteudo->setTexto($_POST['texto']);
        $conteudo->setData($_POST['data']);
        $conteudoDao->inserir($conteudo);
        header("Location: ../view/conteudo/listaConteudos.php");
    }

    if(isset($_GET['editar'])){
        $idConteudo = $_GET['editar'];
        $conteudo = $conteudoDao->buscarPorId($idConteudo);

        if(!$conteudo->getId()){
            header("Location: ../index.php?erro-nao_encontrado");
            exit();
        }
    }

    if(isset($_POST['salvar-edicao'])){
        $conteudo = new Conteudo();
        $conteudo->setId($_POST['id']);
        $conteudo->setTitulo($_POST['titulo']);
        $conteudo->setDescricao($_POST['descricao']);
        $conteudo->setTexto($_POST['texto']);
        $conteudo->setData($_POST['data']);

        $conteudoDao->editar($conteudo);

        header('Location: ../view/conteudo/listaConteudos.php');
        exit();
    }

    function listar(){
        $conteudoDao = new ConteudoDao();
        $lista = $conteudoDao->read();
        foreach($lista as $cont){
            echo
            "<tr>
                <td>{$cont->getId()}</td>
                <td>{$cont->getTitulo()}</td>
                <td>{$cont->getDescricao()}</td>
                <td>{$cont->getTexto()}</td>
                <td>{$cont->getData()}</td>
                <td>
                    <a href='conteudo.php?editar={$cont->getId()}'>Editar</a>
                    <a href='../../controller/conteudoController.php?excluir={$cont->getId()}'>Excluir</a>
                </td>
            </tr>";
        }
    }

    if (isset($_GET['excluir'])) {
        $id = $_GET['excluir'];
        $conteudoDao->deletar($id);
        header("Location: ../view/conteudo/listaConteudos.php");
        exit();
    }

?>