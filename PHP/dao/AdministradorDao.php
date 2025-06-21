'<?php
require_once 'ConnectionFactory.php';
class AdministradorDao {
    private $conexao;
        public function inserir(Administrador $admin) {
            try {
                $sql = "INSERT INTO administrador (nome, nome_social, email, senha, data_nascimento, genero, conselho_profissional, formacao, registro_profissional, especialidade) VALUES (:nome, :nome_social, :email, :senha, :data_nascimento, :genero, :conselho_profissional, :formacao, :registro_profissional, :especialidade)";
                $conn = ConnectionFactory::getConnection()->prepare($sql);
                $conn->bindValue(":nome", $admin->getNome());
                $conn->bindValue(":nome_social", $admin->getNomeSocial());
                $conn->bindValue(":email", $admin->getEmail());
                $conn->bindValue(":senha", $admin->getSenha());
                $conn->bindValue(":data_nascimento", $admin->getDataNascimento());
                $conn->bindValue(":genero", $admin->getGenero());
                $conn->bindValue(":conselho_profissional", $admin->getConselhoProfissional());
                $conn->bindValue(":formacao", $admin->getFormacao());
                $conn->bindValue(":registro_profissional", $admin->getRegistroProfissional());
                $conn->bindValue(":especialidade", $admin->getEspecialidade());
                return $conn->execute();
            } catch (PDOException $ex) {
                echo "<p>Erro ao inserir: " . $ex->getMessage() . "</p>";
                return false;
            }
        }

        public function read() {
            try {
                $sql = "SELECT * FROM administrador";
                $conn = ConnectionFactory::getConnection()->query($sql);
                $lista = $conn->fetchAll(PDO::FETCH_ASSOC);
                $adminList = array();
                foreach ($lista as $admin) {
                    $adminList[] = $this->listaAdministrador($admin);
                }
                return $adminList;
            } catch (PDOException $ex) {
                echo "<p>Erro ao executar a consulta: </p><p>$ex</p>";
            }
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

        
        public function editar($adm) {
            $sql = "UPDATE administrador SET nome = :nome, nome_social = :nome_social, email = :email, senha = :senha, data_nascimento = :data_nascimento, genero = :genero, conselho_profissional = :conselho_profissional, formacao = :formacao, registro_profissional = :registro_profissional, especialidade = :especialidade WHERE id = :id";
            $conn = ConnectionFactory::getConnection()->prepare($sql);
            $conn->bindParam(':nome', $adm->getNome());
            $conn->bindParam(':nome_social', $adm->getNomeSocial());
            $conn->bindParam(':email', $adm->getEmail());
            $conn->bindParam(':senha', $adm->getSenha());
            $conn->bindParam(':data_nascimento', $adm->getDataNascimento());
            $conn->bindParam(':genero', $adm->getGenero());
            $conn->bindParam(':conselho_profissional', $adm->getConselhoProfissional());
            $conn->bindParam(':formacao', $adm->getFormacao());
            $conn->bindParam(':registro_profissional', $adm->getRegistroProfissional());
            $conn->bindParam(':especialidade', $adm->getEspecialidade());
            $conn->bindParam(':id', $adm->getId());
            return $conn->execute();
        }

        public function deletar($id) {
                try {
                    $conn = ConnectionFactory::getConnection();
                    $stmt = $conn->prepare("DELETE FROM administrador WHERE id = :id");
                    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                    return $stmt->execute();
                } catch (PDOException $ex) {
                    echo "<p>Erro ao excluir paciente: $ex</p>";
                }
        }

        public function buscarPorId($id) {
            try{
            $sql = "SELECT * FROM administrador WHERE id = :id";
            $conn = ConnectionFactory::getConnection()->prepare($sql);
            $conn->bindParam(':id', $id);
            $conn->execute();
            $row = $conn->fetch(PDO::FETCH_ASSOC);

            if($row){
                return $this->listaAdministrador($row);
            }
            return null;
            }catch(PDOException $ex){
            echo "<p>Erro ao buscar paciente por ID: </p> <p>{$ex->getMessage()}</p>";
            return null;
            }
        }
}
?>
'