<?php
class PacienteDao{
    public function inserir(Paciente $paciente){
        try{
            $sql = "INSERT INTO usuarios (nome, email, senha, data_nascimento, genero, estado, cidade, medicacao, doenca, tipo_sanguineo) VALUES (:nome, :email, :senha, :data_nascimento, :genero, :estado, :cidade, :medicacao, :doenca, :tipo_sanguineo)";
            $conn = ConnectionFactory::getConnection()->prepare($sql);
            $conn->bindValue(":nome", $paciente->getNome());
            $conn->bindValue(":email", $paciente->getEmail());
            $conn->bindValue(":senha", $paciente->getSenha());
            $conn->bindValue(":data_nascimento", $paciente->getDataNascimento());
            $conn->bindValue(":genero", $paciente->getGenero());
            $conn->bindValue(":estado", $paciente->getEstado());
            $conn->bindValue(":cidade", $paciente->getCidade());
            $conn->bindValue(":medicacao", $paciente->getMedicacao());
            $conn->bindValue(":doenca", $paciente->getDoenca());
            $conn->bindValue(":tipo_sanguineo", $paciente->getTipoSanguineo());
            return $conn->execute(); // Executa o insert
        }catch(PDOException $ex){
            echo "<p> Erro </p> <p> $ex </p>";
        }
    }

    public function read(){
        try{
            $sql = "SELECT * FROM paciente";
            $conn = ConnectionFactory::getConnection()->query($sql);
            $lista = $conn->fetchAll(PDO::FETCH_ASSOC);
            $pacienteList = array();
            foreach($lista as $pac){
                $pacienteList[] = $this->listaPaciente($pac); // Adiciona paciente
            }
            echo "Temos ". count($pacienteList) . " cadastros no banco";
            return $pacienteList;
        }catch (PDOException $ex){
            echo "<p>Ocorreu um erro ao executar a consulta </p> {$ex}";
        }
    }

    // Converter uma linha em obj
    public function listaPaciente($row){
        $paciente = new Paciente();
        $paciente->setId($row['id']);
        $paciente->setNome($row['nome']);
        $paciente->setEmail($row['nome']);
        $paciente->setDataNascimento($row['nome']);
        $paciente->setGenero($row['nome']);
        $paciente->setEstado($row['nome']);
        $paciente->setCidade($row['nome']);
        $paciente->setMedicacao($row['nome']);
        $paciente->setDoenca($row['nome']);
        $paciente->setTipoSanguineo($row['nome']);
        return $paciente;
    }
}
?>