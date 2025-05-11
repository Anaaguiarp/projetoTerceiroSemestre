<?php

class PacienteDao{
    
    public function inserir(Paciente $paciente){
        try{
            $sql = "INSERT INTO usuarios (nome, email, senha, data_nascimento, genero, estado, cidade, medicacao, doenca) VALUES (:nome, :email, :senha, :data_nascimento, :genero, :estado, :cidade, :medicacao, :doenca)";
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
            return $conn->execute(); // Executa o insert
        }catch(PDOException $ex){
            echo "<p> Erro </p> <p> $ex </p>";
        }
    }
}

?>