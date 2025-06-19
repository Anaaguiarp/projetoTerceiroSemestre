<?php
require_once __DIR__ . '/../dao/ConnectionFactory.php';
require_once('config.php');

function listarAdministradores() {
    $ch = curl_init(API_URL . '/administradores');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resposta = curl_exec($ch);
    curl_close($ch);

    return json_decode($resposta, true);
}

function cadastrarAdministrador($dados) {
    $ch = curl_init(API_URL . '/novoadministrador');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dados));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resposta = curl_exec($ch);
    curl_close($ch);

    return json_decode($resposta, true);
}

function editarAdministrador($id, $dados) {
    $ch = curl_init(API_URL . "/editaradministrador/$id");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dados));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resposta = curl_exec($ch);
    curl_close($ch);

    return json_decode($resposta, true);
}

function excluirAdministrador($id) {
    $ch = curl_init(API_URL . "/removeradministrador/$id");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resposta = curl_exec($ch);
    curl_close($ch);

    return json_decode($resposta, true);
}

class AdministradorDao {
    private $conexao;

    public function __construct() {
        $this->conexao = ConnectionFactory::getConnection();
    }

    public function inserir(Administrador $admin) {
        try {
            $sql = "INSERT INTO administrador (nome, nome_social, email, senha, data_nascimento, genero, conselho_profissional, formacao, registro_profissional, especialidade) VALUES (:nome, :nome_social, :email, :senha, :data_nascimento, :genero, :conselho_profissional, :formacao, :registro_profissional, :especialidade)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(":nome", $admin->getNome());
            $stmt->bindValue(":nome_social", $admin->getNomeSocial());
            $stmt->bindValue(":email", $admin->getEmail());
            $stmt->bindValue(":senha", $admin->getSenha());
            $stmt->bindValue(":data_nascimento", $admin->getDataNascimento());
            $stmt->bindValue(":genero", $admin->getGenero());
            $stmt->bindValue(":conselho_profissional", $admin->getConselhoProfissional());
            $stmt->bindValue(":formacao", $admin->getFormacao());
            $stmt->bindValue(":registro_profissional", $admin->getRegistroProfissional());
            $stmt->bindValue(":especialidade", $admin->getEspecialidade());
            return $stmt->execute();
        } catch (PDOException $ex) {
            echo "<p>Erro!</p> <p>$ex</p>";
        }
    }

    public function read() {
        try {
            $sql = "SELECT * FROM administrador";
            $stmt = $this->conexao->query($sql);
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $adminList = array();
            foreach ($lista as $admin) {
                $adminList[] = $this->listaAdministrador($admin);
            }
            return $adminList;
        } catch (PDOException $ex) {
            echo "<p>Erro ao executar a consulta: </p><p>$ex</p>";
        }
    }

    public function deletar($id) {
        $sql = "DELETE FROM administrador WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM administrador WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($dados) {
            $adm = new Administrador();
            $adm->setId($dados['id']);
            $adm->setNome($dados['nome']);
            $adm->setNomeSocial($dados['nome_social']);
            $adm->setEmail($dados['email']);
            $adm->setSenha($dados['senha']);
            $adm->setDataNascimento($dados['data_nascimento']);
            $adm->setGenero($dados['genero']);
            $adm->setConselhoProfissional($dados['conselho_profissional']);
            $adm->setFormacao($dados['formacao']);
            $adm->setRegistroProfissional($dados['registro_profissional']);
            $adm->setEspecialidade($dados['especialidade']);
            return $adm;
        }
        return null;
    }

    public function atualizar($adm) {
        $sql = "UPDATE administrador SET nome = :nome, nome_social = :nome_social, email = :email, senha = :senha, data_nascimento = :data_nascimento, genero = :genero, conselho_profissional = :conselho_profissional, formacao = :formacao, registro_profissional = :registro_profissional, especialidade = :especialidade WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':nome', $adm->getNome());
        $stmt->bindParam(':nome_social', $adm->getNomeSocial());
        $stmt->bindParam(':email', $adm->getEmail());
        $stmt->bindParam(':senha', $adm->getSenha());
        $stmt->bindParam(':data_nascimento', $adm->getDataNascimento());
        $stmt->bindParam(':genero', $adm->getGenero());
        $stmt->bindParam(':conselho_profissional', $adm->getConselhoProfissional());
        $stmt->bindParam(':formacao', $adm->getFormacao());
        $stmt->bindParam(':registro_profissional', $adm->getRegistroProfissional());
        $stmt->bindParam(':especialidade', $adm->getEspecialidade());
        $stmt->bindParam(':id', $adm->getId());
        return $stmt->execute();
    }

    public function listaAdministrador($row) {
            $admin = new Administrador();
            $admin->setId($row['id']);
            $admin->setNome($row['nome']);
            $admin->setNomeSocial($row['nome_social']);
            $admin->setEmail($row['email']);
            $admin->setSenha($row['senha']);
            $admin->setDataNascimento($row['data_nascimento']);
            $admin->setGenero($row['genero']);
            $admin->setConselhoProfissional($row['conselho_profissional']);
            $admin->setFormacao($row['formacao']);
            $admin->setRegistroProfissional($row['registro_profissional']);
            $admin->setEspecialidade($row['especialidade']);
            return $admin;
    }

    public function buscarPorEmail($email) {
        $sql = "SELECT * FROM administrador WHERE email = :email";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($dados) {
            $adm = new Administrador();
            $adm->setId($dados['id']);
            $adm->setNome($dados['nome']);
            $adm->setNomeSocial($dados['nome_social']);
            $adm->setEmail($dados['email']);
            $adm->setSenha($dados['senha']);
            $adm->setDataNascimento($dados['data_nascimento']);
            $adm->setGenero($dados['genero']);
            $adm->setConselhoProfissional($dados['conselho_profissional']);
            $adm->setFormacao($dados['formacao']);
            $adm->setRegistroProfissional($dados['registro_profissional']);
            $adm->setEspecialidade($dados['especialidade']);
            return $adm;
        }
        return null;
    }
}
?>
