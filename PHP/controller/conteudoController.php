<?php
    require __DIR__ . '/../dao/ConnectionFactory.php';
    require __DIR__ . '/../model/Conteudo.php';

    $conteudoDao = new ConteudoDao();

    if(isset($_POST['cadastrar'])){
        $conteudo = new Conteudo();
        $conteudo->setTitulo($_POST['titulo']);
        $conteudo->setTitulo($_POST['descricao']);
        $conteudo->setTitulo($_POST['conteudo']);
        $conteudo->setTitulo($_POST['data']);
        $conteudoDao->inserir($conteudo);
        header("Location: ../view/homePage/index.php");
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
        $conteudo->setId($_POST['titulo']);
        $conteudo->setId($_POST['descricao']);
        $conteudo->setId($_POST['conteudo']);
        $conteudo->setId($_POST['data']);

        $conteudoDao->editar($conteudo);

        header('Location: ../view/listagem/listagemUsuarios.php');
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
                <td>{$cont->getConteudo()}</td>
                <td>{$cont->getData()}</td>
                <td>
                    <a href='#'>Editar</a>
                    <a href='#'>Excluir</a>
                </td>
            </tr>";
        }
    }
?>