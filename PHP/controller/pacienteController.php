<?php
    require __DIR__ . '/../dao/ConnectionFactory.php';
    require __DIR__ . '/../model/Pessoa.php';
    require __DIR__ . '/../model/Paciente.php';
    require __DIR__ . '/../dao/PacienteDaoSql.php';

    $pacienteDao = new PacienteDaoSql();

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

    function listarSQL(){
        $pacienteDao = new PacienteDaoSql();
        $lista = $pacienteDao->read();
        foreach($lista as $pac){
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
                    <a href='../cadastroPaciente/cadastro.php?editar={$pac->getId()}'>Editar</a>
                    <a href='../../controller/pacienteController.php?id={$pac->getId()}'>Excluir</a>
                </td>
            </tr>";
        }
    }
    
?>