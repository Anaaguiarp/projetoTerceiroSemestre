<?php
    require __DIR__ . '/../dao/ConteudoDao.php';
    require __DIR__ . '/../model/Conteudo.php';

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $conteudoDao = new ConteudoDao();

    if(isset($_POST['publicar'])){
        $conteudo = new Conteudo();
        $conteudo->setTitulo($_POST['titulo']);
        $conteudo->setDescricao($_POST['descricao']);
        $conteudo->setTexto($_POST['texto']);
        $conteudo->setCategoria($_POST['categoria']);
        $conteudo->setData(date('Y-m-d')); 
        $conteudo->setNomeAutor($_POST['admin_nome']);
        if ($conteudoDao->inserir($conteudo)) {
            header("Location: ../view/conteudo/listaConteudos.php");
            exit();
        } else {
            echo "Erro ao publicar o conteúdo.";
        }
    }

    if(isset($_GET['editar'])){
        $idConteudo = $_GET['editar'];
        $conteudo = $conteudoDao->buscarPorId($idConteudo);

        if(!$conteudo->getId()){
            header("Location: ../../index.php?erro-nao_encontrado");
            exit();
        }
    }

    if(isset($_POST['salvar-edicao'])){
        $conteudo = new Conteudo();
        $conteudo->setId($_POST['id']);

        $conteudo->setTitulo($_POST['titulo']);
        $conteudo->setDescricao($_POST['descricao']);
        $conteudo->setTexto($_POST['texto']);
        $conteudo->setCategoria($_POST['categoria']);
        $conteudo->setData(date('Y-m-d')); 

        $conteudoDao->editar($conteudo);

        header('Location: ../view/conteudo/listaConteudos.php');
        exit();
    }

    function listarComoCards($categoria = null) {
        $conteudoDao = new ConteudoDao();
        $lista = $conteudoDao->read();

        foreach ($lista as $cont) {
            if ($categoria && strtolower($cont->getCategoria()) !== strtolower($categoria)) {
                continue;
            }

            $titulo = htmlspecialchars($cont->getTitulo());
            $descricao = htmlspecialchars($cont->getDescricao());
            $data = date("d/m/Y", strtotime($cont->getData()));
            $id = $cont->getId();
            ?>

            <div class='col'>
                <div class='card h-100 shadow-sm border-0'>
                    <div class='card-body'>
                        <a href='post.php?id=<?= $id ?>' class='text-decoration-none text-dark'>
                            <h5 class='card-title'><?= $titulo ?></h5>
                            <h6 class='card-subtitle mb-2 text-muted'><?= $data ?></h6>
                            <p class='card-text'><?= $descricao ?></p>
                        </a>
                    </div>

                    <?php if (isset($_SESSION['administrador'])): ?>
                        <div class='card-footer bg-transparent border-0 d-flex justify-content-between'>
                            <a href='conteudo.php?editar=<?= $id ?>' class='btn btn-sm btn-outline-primary'>
                                <i class='bi bi-pencil-square'></i> Editar
                            </a>
                            <a href='../../controller/conteudoController.php?excluir=<?= $id ?>' class='btn btn-sm btn-outline-danger'>
                                <i class='bi bi-trash'></i> Excluir
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php
        }
    }

    if (isset($_GET['excluir'])) {
        $id = $_GET['excluir'];
        $conteudoDao->deletar($id);
        header("Location: ../view/conteudo/listaConteudos.php");
        exit();
    }
?>