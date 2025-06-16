<?php
    require_once 'ConnectionFactory.php'
;       class PacienteDaoSql {
            public function inserir(Paciente $paciente) {
                try {
                    $sql = "INSERT INTO paciente (nome, nome_social, email, senha, data_nascimento, genero, estado, cidade, medicacao, doenca, tipo_sanguineo) VALUES (:nome, :nome_social, :email, :senha, :data_nascimento, :genero, :estado, :cidade, :medicacao, :doenca, :tipo_sanguineo)";
                    $conn = ConnectionFactory::getConnection()->prepare($sql);
                    $conn->bindValue(":nome", $paciente->getNome());
                    $conn->bindValue(":nome_social", $paciente->getNomeSocial());
                    $conn->bindValue(":email", $paciente->getEmail());
                    $conn->bindValue(":senha", $paciente->getSenha());
                    $conn->bindValue(":data_nascimento", $paciente->getDataNascimento());
                    $conn->bindValue(":genero", $paciente->getGenero());
                    $conn->bindValue(":estado", $paciente->getEstado());
                    $conn->bindValue(":cidade", $paciente->getCidade());
                    $conn->bindValue(":medicacao", $paciente->getMedicacao());
                    $conn->bindValue(":doenca", $paciente->getDoenca());
                    $conn->bindValue(":tipo_sanguineo", $paciente->getTipoSanguineo());
                    return $conn->execute();
                } catch (PDOException $ex) {
                    echo "<p>Erro!</p> <p>$ex</p>";
                }
            }

            public function read() {
                try {
                    $sql = "SELECT * FROM paciente";
                    $conn = ConnectionFactory::getConnection()->query($sql);
                    $lista = $conn->fetchAll(PDO::FETCH_ASSOC);
                    $pacienteList = array();
                    foreach ($lista as $pac) {
                        $pacienteList[] = $this->listaPaciente($pac);
                    }
                    return $pacienteList;
                } catch (PDOException $ex) {
                    echo "<p>Ocorreu um erro ao executar a consulta: </p> {$ex}";
                }
            }

            public function listaPaciente($row) {
                $paciente = new Paciente();
                $paciente->setId($row['id']);
                $paciente->setNome($row['nome']);
                $paciente->setNomeSocial($row['nome_social']);
                $paciente->setEmail($row['email']);
                $paciente->setSenha($row['senha']);
                $paciente->setDataNascimento($row['data_nascimento']);
                $paciente->setGenero($row['genero']);
                $paciente->setEstado($row['estado']);
                $paciente->setCidade($row['cidade']);
                $paciente->setMedicacao($row['medicacao']);
                $paciente->setDoenca($row['doenca']);
                $paciente->setTipoSanguineo($row['tipo_sanguineo']);
                return $paciente;
            }

            public function editar(Paciente $pac){
                try{
                    $sql = "UPDATE paciente SET nome = :nome, nome_social = :nome_social, email = :email, senha = :senha, data_nascimento = :data_nascimento, genero = :genero, estado = :estado, cidade = :cidade, medicacao = :medicacao, doenca = :doenca, tipo_sanguineo = :tipo_sanguineo WHERE id = :id";
                    $conn = ConnectionFactory::getConnection()->prepare($sql);
                    $conn->bindValue(":nome", $pac->getNome());
                    $conn->bindValue(":nome_social", $pac->getNomeSocial());
                    $conn->bindValue(":email", $pac->getEmail());
                    $conn->bindValue(":senha", $pac->getSenha());
                    $conn->bindValue(":data_nascimento", $pac->getDataNascimento());
                    $conn->bindValue(":genero", $pac->getGenero());
                    $conn->bindValue(":estado", $pac->getEstado());
                    $conn->bindValue(":cidade", $pac->getCidade());
                    $conn->bindValue(":medicacao", $pac->getMedicacao());
                    $conn->bindValue(":doenca", $pac->getDoenca());
                    $conn->bindValue(":tipo_sanguineo", $pac->getTipoSanguineo());
                    $conn->bindValue(":id", $pac->getId());
                    return $conn->execute();
                }catch(PDOException $ex){
                    echo "<p>Erro ao editar</p><p>$ex</p>";
                }
            }

// A PROFESSORA NAO FEZ??????
            public function excluir($id) {
                try {
                    $conn = ConnectionFactory::getConnection();
                    $stmt = $conn->prepare("DELETE FROM paciente WHERE id = :id");
                    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                    return $stmt->execute();
                } catch (PDOException $ex) {
                    echo "<p>Erro ao excluir paciente: $ex</p>";
                }
            }

// MUDAR ISSO AQUI (FabricanteDaoSQL)
            public function buscarPorId($id) {
                try{
                    $sql = "SELECT * FROM paciente WHERE id = :id";
                    $conn = ConnectionFactory::getConnection()->prepare($sql);
                    $conn->bindValue(":id", $id);
                    $conn->execute();
                    $row = $conn->fetch(PDO::FETCH_ASSOC);
                    if($row){
                        return $this->listaPaciente($row);
                    }
                    return null;
                }catch(PDOException $ex){
                    echo "<p>Erro ao buscar paciente por ID: </p> <p>{$ex->getMessage()}</p>";
                    return null;
                }
            }
    }
?>