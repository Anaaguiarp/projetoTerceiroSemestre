<?php
    require __DIR__ . '/../dao/ConnectionFactory.php';
    require __DIR__ . '/../model/Pessoa.php';
    require __DIR__ . '/../model/Paciente.php';
    require __DIR__ . '/../dao/PacienteDaoSql.php';
    require __DIR__ . '/../dao/PacienteDao.php';

    $pacienteDao = new PacienteDaoSql();

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $pacienteDao->excluir($id);
        header('Location: ../view/listagem/listagemUsuarios.php');
        exit();
    }

    if(isset($_POST['cadastrar'])){
        $paciente = new Paciente();
        $paciente->setNome($_POST['nome']);
        $paciente->setNomeSocial($_POST['nome_social']);
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
        header("Location: ../view/homePage/index.php");
    }

    if(isset($_GET['editar'])){
        $idPaciente = $_GET['editar'];
        $paciente = $pacienteDao->buscarPorId($idPaciente);
        
        if(!$paciente->getId()){
            // echo "<p>Paciente não encontrado para edição.</p>";
            header("Location: ../index.php?erro=nao_encontrado");
            exit();
        }
    }

    if(isset($_POST['salvar-edicao'])){
        $paciente = new Paciente();
        $paciente->setId($_POST['id']);
        $paciente->setNome($_POST['nome']);
        $paciente->setNomeSocial($_POST['nome_social']);
        $paciente->setEmail($_POST['email']);
        $paciente->setSenha($_POST['senha']);
        $paciente->setDataNascimento($_POST['data_nascimento']);
        $paciente->setGenero($_POST['genero']);
        $paciente->setEstado($_POST['estado']);
        $paciente->setCidade($_POST['cidade']);
        $paciente->setMedicacao($_POST['medicacao']);
        $paciente->setDoenca($_POST['doenca']);
        $paciente->setTipoSanguineo($_POST['tipo_sanguineo']);

        $pacienteDao->editar($paciente);
        
        header('Location: ../view/listagem/listagemUsuarios.php');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['_method']) && $_POST['_method'] === 'PUT') {
    $id = $_POST['id'];
    $paciente = new Paciente();
    $paciente->setId($id);
    $paciente->setNome($_POST['nome']);
    $paciente->setNomeSocial($_POST['nome_social']);
    $paciente->setEmail($_POST['email']);
    $paciente->setMedicacao($_POST['medicacao']);
    $paciente->setDoenca($_POST['doenca']);
    $paciente->setTipoSanguineo($_POST['tipo_sanguineo']);

    $dao = new PacienteDao(); // esse chama sua API
    $dao->editar($paciente);

    header("Location: ../view/listagem/listagemUsuarios.php");
    exit();
    }

    //O HTML não suporta o método delete, então a gente faz essa simulação HTTP para "enganar o HTML"
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['_method']) && $_POST['_method'] === 'DELETE') {
        $id = $_POST['id'];

        $dao = new PacienteDao(); //intância da dao pra chamar o método deletar
        $dao->deletar($id); //pega o id e deleta

        header("Location: ../view/listagem/listagemUsuarios.php"); //redireciona novamente para a listagem
        exit();
    }

    function listarSQL() {
        $pacienteDao = new PacienteDaoSql();
        $lista = $pacienteDao->read();
        foreach ($lista as $pac) {
            echo 
            "<tr>
                <td> {$pac->getId()} </td>
                <td> {$pac->getNome()}</td>
                <td> {$pac->getNomeSocial()}</td>
                <td> {$pac->getEmail()}</td>
                <td> {$pac->getDataNascimento()}</td>
                <td> {$pac->getGenero()}</td>
                <td> {$pac->getEstado()}</td>
                <td> {$pac->getCidade()}</td>
                <td> {$pac->getMedicacao()}</td>
                <td> {$pac->getDoenca()}</td>
                <td> {$pac->getTipoSanguineo()}</td>
                <td>
                    <div class='d-flex flex-column align-items-center gap-1'>
                        <a href='../cadastroPaciente/cadastro.php?editar={$pac->getId()}' class='btn btn-warning btn-sm mb-2 text-white w-100'>Editar</a>
                        <form action='../../controller/pacienteController.php' method='POST' onsubmit=\"return confirm('Tem certeza que deseja excluir?')\">
                            <input type='hidden' name='id' value='{$pac->getId()}'> <!--Pega o id do paciente para excluir -->
                            <input type='hidden' name='_method' value='DELETE'> <!-- Esse é o campo oculto pra fazer a simulação do DELETE -->
                            <button type='submit' class='btn btn-danger btn-sm w-100'>Excluir</button>
                        </form>
                    </div>
                </td>
            </tr>";
        }
    }
?>