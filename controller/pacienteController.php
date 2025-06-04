<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require __DIR__ . '/../dao/ConnectionFactory.php';
    require __DIR__ . '/../model/Pessoa.php';
    require __DIR__ . '/../model/Paciente.php';
    require __DIR__ . '/../dao/PacienteDao.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'excluir') {
        require_once __DIR__ . '/../dao/PacienteDao.php';

        $id = $_POST['id'];

        $dao = new PacienteDao();
        $dao->excluir($id);

        http_response_code(200);
        echo "Excluído com sucesso!";
        exit();
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cadastrar'])) {
        $senha = $_POST['senha'];
        $confirmaSenha = $_POST['confirma_senha'];

        if ($senha !== $confirmaSenha) {
            session_start();
            $_SESSION['erro'] = 'As senhas não coincidem.';
            header('Location: ../view/cadastro/cadastro.php'); // ou o caminho correto da view
            exit();
        }

        $pacienteDao = new PacienteDao();

        $paciente = new Paciente();
        $paciente->setNome($_POST['nome']);
        $paciente->setNomeSocial($_POST['nome_social']);
        $paciente->setEmail($_POST['email']);
        $senhaCriptografada = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $paciente->setSenha($senhaCriptografada);
        $paciente->setDataNascimento($_POST['data_nascimento']);
        $paciente->setGenero($_POST['genero']);
        $paciente->setEstado($_POST['estado']);
        $paciente->setCidade($_POST['cidade']);
        $paciente->setMedicacao($_POST['medicacao']);
        $paciente->setDoenca($_POST['doenca']);
        $paciente->setTipoSanguineo($_POST['tipo_sanguineo']);

        $resultado = $pacienteDao->inserir($paciente);

        session_start();
        if ($resultado) {
            $_SESSION['sucesso'] = 'Paciente inserido com sucesso!';
            header('Location: ../view/homePage/index.php');
        } else {
            $_SESSION['erro'] = 'Falha na inserção.';
            header('Location: ../view/cadastro/cadastro.php');
        }

        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['acao'] === 'atualizar') {
        $paciente = new Paciente();
        $paciente->setId($_POST['id']);
        $paciente->setNome($_POST['nome']);
        $paciente->setNomeSocial($_POST['nome_social']);
        $paciente->setEmail($_POST['email']);
        if (!empty($_POST['senha'])) {
            $paciente->setSenha(password_hash($_POST['senha'], PASSWORD_DEFAULT));
        } else {
            // Buscar senha antiga do banco
            $pacienteExistente = (new PacienteDao())->buscarPorId($_POST['id']);
            $paciente->setSenha($pacienteExistente->getSenha());
        }
        $paciente->setDataNascimento($_POST['data_nascimento']);
        $paciente->setGenero($_POST['genero']);
        $paciente->setEstado($_POST['estado']);
        $paciente->setCidade($_POST['cidade']);
        $paciente->setMedicacao($_POST['medicacao']);
        $paciente->setDoenca($_POST['doenca']);
        $paciente->setTipoSanguineo($_POST['tipo_sanguineo']);

        $dao = new PacienteDao();
        $dao->atualizar($paciente);
        header("Location: ../view/listagem/listagemUsuarios.php");
        exit();
    }

    function listar() {
        $pacienteDao = new PacienteDao();
        $lista = $pacienteDao->read();

        if (empty($lista)) {
            echo "<tr><td colspan='12'>Nenhum paciente cadastrado.</td></tr>";
            return;
        }

        foreach ($lista as $pac) {
            echo "<tr class=\"mb-4\">
                <td>{$pac->getId()}</td>
                <td>{$pac->getNome()}</td>
                <td>{$pac->getNomeSocial()}</td>
                <td>{$pac->getEmail()}</td>
                <td>{$pac->getDataNascimento()}</td>
                <td>{$pac->getGenero()}</td>
                <td>{$pac->getEstado()}</td>
                <td>{$pac->getCidade()}</td>
                <td>{$pac->getMedicacao()}</td>
                <td>{$pac->getDoenca()}</td>
                <td>{$pac->getTipoSanguineo()}</td>
                <td>
                    <a href='../edicaoUsuario/editarPaciente.php?id={$pac->getId()}'>Editar</a>
                    <a href=\"#\" class=\"excluir-usuario\" data-id=\"{$pac->getId()}\">Excluir</a>
                </td>
            </tr>";
        }
    }
?>