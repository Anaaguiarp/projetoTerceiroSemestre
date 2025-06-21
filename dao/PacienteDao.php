<?php

    class PacienteDao{
        public function inserir(Paciente $pac){
            $url = "http://localhost:3000/pacientes";
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
            $url = "http://localhost:3000/pacientes";
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
            $paciente->setId(htmlspecialchars($row['id']));
            $paciente->setNome(htmlspecialchars($row['nome']));
            $paciente->setNomeSocial(htmlspecialchars($row['nome_social']));
            $paciente->setEmail(htmlspecialchars($row['email']));
            $paciente->setSenha(htmlspecialchars($row['senha']));
            $paciente->setDataNascimento(htmlspecialchars($row['data_nascimento']));
            $paciente->setGenero(htmlspecialchars($row['genero']));
            $paciente->setEstado(htmlspecialchars($row['estado']));
            $paciente->setCidade(htmlspecialchars($row['cidade']));
            $paciente->setMedicacao(htmlspecialchars($row['medicacao']));
            $paciente->setDoenca(htmlspecialchars($row['doenca']));
            $paciente->setTipoSanguineo(htmlspecialchars($row['tipo_sanguineo']));
        }
        
        public function editar(Paciente $pac){
            $url = "http://localhost:3000/pacientes/".$pac->getId();
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
                return ["erro" => "Falha na requisiçãp PATCH"];
            }

            return json_decode($result, true);
        }
    
        public function buscarPorId($id){
            $url = "http://localhost:3000/pacientes/" . urlencode($id);
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