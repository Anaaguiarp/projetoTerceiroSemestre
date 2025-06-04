<?php
    class AdministradorDao {
        public function inserir(Administrador $admin) {
            try {
                $sql = "INSERT INTO administrador (nome, nome_social, email, senha, data_nascimento, genero, conselhoProfissional, formacao, registroProfissional, especialidade) VALUES (:nome, :nome_social, :email, :senha, :data_nascimento, :genero, :conselhoProfissional, :formacao, :registroProfissional, :especialidade)";
                $conn = ConnectionFactory::getConnection()->prepare($sql);
                $conn->bindValue(":nome", $admin->getNome());
                $conn->bindValue(":nome_social", $admin->getNomeSocial());
                $conn->bindValue(":email", $admin->getEmail());
                $conn->bindValue(":senha", $admin->getSenha());
                $conn->bindValue(":data_nascimento", $admin->getDataNascimento());
                $conn->bindValue(":genero", $admin->getGenero());
                $conn->bindValue(":conselhoProfissional", $admin->getConselhoProfissional());
                $conn->bindValue(":formacao", $admin->getFormacao());
                $conn->bindValue(":registroProfissional", $admin->getRegistroProfissional());
                $conn->bindValue(":especialidade", $admin->getEspecialidade());
                return $conn->execute();
            } catch (PDOException $ex) {
                echo "<p>Erro!</p> <p>$ex</p>";
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
            $admin->setConselhoProfissional($row['conselhoProfissional']);
            $admin->setFormacao($row['formacao']);
            $admin->setRegistroProfissional($row['registroProfissional']);
            $admin->setEspecialidade($row['especialidade']);
            return $admin;
        }
    }
?>