<?php
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
                $senhaHash = password_hash($admin->getSenha(), PASSWORD_DEFAULT);
                $conn->bindValue(":senha", $senhaHash);
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
            try {
                $sql = "UPDATE administrador SET 
                    nome = :nome, 
                    nome_social = :nome_social, 
                    email = :email, 
                    senha = :senha, 
                    data_nascimento = :data_nascimento, 
                    genero = :genero, 
                    conselho_profissional = :conselho_profissional, 
                    formacao = :formacao, 
                    registro_profissional = :registro_profissional, 
                    especialidade = :especialidade 
                    WHERE id = :id";

                $conn = ConnectionFactory::getConnection()->prepare($sql);

                if (!empty($_POST['senha'])) {
                    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
                } else {
                    $admAtual = $this->buscarPorId($adm->getId());
                    $senha = $admAtual->getSenha();
                }

                $conn->bindValue(':nome', $adm->getNome());
                $conn->bindValue(':nome_social', $adm->getNomeSocial());
                $conn->bindValue(':email', $adm->getEmail());
                $conn->bindValue(':senha', $senha);
                $conn->bindValue(':data_nascimento', $adm->getDataNascimento());
                $conn->bindValue(':genero', $adm->getGenero());
                $conn->bindValue(':conselho_profissional', $adm->getConselhoProfissional());
                $conn->bindValue(':formacao', $adm->getFormacao());
                $conn->bindValue(':registro_profissional', $adm->getRegistroProfissional());
                $conn->bindValue(':especialidade', $adm->getEspecialidade());
                $conn->bindValue(':id', $adm->getId());

                return $conn->execute();
            } catch (PDOException $ex) {
                echo "<p>Erro ao editar administrador:</p><p>" . $ex->getMessage() . "</p>";
                return false;
            }
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

        public function buscarPorEmail($email) {
            try {
                $sql = "SELECT * FROM administrador WHERE email = :email";
                $conn = ConnectionFactory::getConnection()->prepare($sql);
                $conn->bindParam(':email', $email);
                $conn->execute();
                $row = $conn->fetch(PDO::FETCH_ASSOC);

                if ($row) {
                    return $this->listaAdministrador($row);
                }
                return null;
            } catch (PDOException $ex) {
                echo "<p>Erro ao buscar administrador por email: {$ex->getMessage()}</p>";
                return null;
            }
        }
    }
?>
