<?php
    class PacienteDao{
        public function inserir(Paciente $pac){
            $url = "http://localhost:3001/api/paciente";
            $dados = [
                "nome" => $pac->getNome(),
                "nome_social" => $pac->getNomeSocial(),
                "email" => $pac->getEmail(),
                "senha" => $pac->getSenha(),
                "data_nascimento" => $pac->getDataNascimento(),
                "genero" => $pac->getGenero(),
                "estado" => $pac->getEstado(),
                "cidade" => $pac->getCidade(),
                "medicacao" => $pac->getMedicacao(),
                "doenca" => $pac->getDoenca(),
                "tipo_sanguineo" => $pac->getTipoSanguineo(),
            ];

            $options = [
                "http" => [
                    "header" => "Content-Type: application/json\r\n",
                    "method" => "POST",
                    "content" => json_encode($dados)
                ]
            ];

            $context = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
            return $result ? json_decode($result, true) : false;
        }
    
        public function read(){
            $url = "http://localhost:3001/api/pacientes";
            $result = file_get_contents($url);
            $pacList = array();
            $lista = json_decode($result, true);
            foreach($lista as $pac):
                $pacList[] = $this->listaPaciente($pac);
            endforeach;
            return $pacList;
        }

        public function listaPaciente($row){
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
            $url = "http://localhost:3001/api/pacientes/".$pac->getId();
            $dados = [
                "nome" => $pac->getNome(),
                "nome_social" => $pac->getNomeSocial(),
                "email" => $pac->getEmail(),
                "senha" => $pac->getSenha(),
                "data_nascimento" => $pac->getDataNascimento(),
                "genero" => $pac->getGenero(),
                "estado" => $pac->getEstado(),
                "cidade" => $pac->getCidade(),
                "medicacao" => $pac->getMedicacao(),
                "doenca" => $pac->getDoenca(),
                "tipo_sanguineo" => $pac->getTipoSanguineo()
            ];

            $options = [
                "http" => [
                    "header"  => "Content-Type: application/json\r\n",
                    "method"  => "PUT",
                    "content" => json_encode($dados)
                ]
            ];

            $context = stream_context_create($options);
            $result = file_get_contents($url, false, $context);

            if($result === FALSE){
                return ["erro" => "Falha na requisiçãp PUT"];
            }

            return json_decode($result, true);
        }

        public function deletar($id) {
            $url = "http://localhost:3001/api/pacientes";
            $dados = ["id" => $id];
            
            $options = [
                "http" => [
                    "header"  => "Content-Type: application/json\r\n",
                    "method"  => "DELETE",
                    "content" => json_encode($dados)
                ]
            ];

            $context = stream_context_create($options);
            $result = file_get_contents($url, false, $context);

            return $result ? json_decode($result, true) : false;
        }
    
        public function buscarPorId($id){
            $url = "http://localhost:3001/api/pacientes/" . urlencode($id);
            try {
                $response = @file_get_contents($url);
                if ($response === FALSE) {
                    return null; // ID não encontrado ou erro na requisição
                }
                $data = json_decode($response, true);
                if ($data) {
                    return $this->listaPaciente($data);
                }
                return null;
            } catch (Exception $e) {
                echo "<p>Erro ao buscar paciente por ID: </p> <p>{$e->getMessage()}</p>";
                return null;
            }
        }
    }
?>