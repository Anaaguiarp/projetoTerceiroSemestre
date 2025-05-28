<?php
    class AdministradorDao {
        public function inserir(Admin $admin) {
            try {
                $sql = "INSERT INTO administrador (nome, nome_social, email, senha, data_nascimento, genero, ultimoLogin, documento, formacao, especialidade) VALUES (:nome, :nome_social, :email, :senha, :data_nascimento, :genero, :ultimoLogin, :documento, :formacao, :especialidade)";
                $conn = ConnectionFactory::getConnection()->prepare($sql);
                $conn->bindValue(":nome", $admin->getNome());
                $conn->bindValue(":nome_social", $admin->getNomeSocial());
                $conn->bindValue(":email", $admin->getEmail());
                $conn->bindValue(":senha", $admin->getSenha());
                $conn->bindValue(":data_nascimento", $admin->getDataNascimento());
                $conn->bindValue(":genero", $admin->getGenero());
                $conn->bindValue(":ultimoLogin", $admin->getUltimoLogin());
                $conn->bindValue(":documento", $admin->getDocumento());
                $conn->bindValue(":formacao", $admin->getFormacao());
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
            $admin = new Admin();
            $admin->setId($row['id']);
            $admin->setNome($row['nome']);
            $admin->setNomeSocial($row['nome_social']);
            $admin->setEmail($row['email']);
            $admin->setSenha($row['senha']);
            $admin->setDataNascimento($row['data_nascimento']);
            $admin->setGenero($row['genero']);
            $admin->setUltimoLogin($row['ultimoLogin']);
            $admin->setDocumento($row['documento']);
            $admin->setFormacao($row['formacao']);
            $admin->setEspecialidade($row['especialidade']);
            return $admin;
        }
    }
?>