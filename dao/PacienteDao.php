<?php
    class PacienteDao {
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
                echo "<p>Erro ao executar a consulta: </p><p>$ex</p>";
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

        public function buscarPorEmail($email) {
            $conn = ConnectionFactory::getConnection();
            $stmt = $conn->prepare("SELECT * FROM paciente WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $paciente = new Paciente();
                $paciente->setId($row['id']);
                $paciente->setNome($row['nome']);
                $paciente->setEmail($row['email']);
                $paciente->setSenha($row['senha']);
                // Adicione os outros campos se quiser
                return $paciente;
            }

            return null;
        }
    }
?>