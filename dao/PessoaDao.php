<?php

class PessoaDao{
    
    public function inserir(Pessoa $pessoa){
        try{
            $sql = "INSERT INTO pessoa (nome, email, senha, data_nascimento, genero) VALUES (:nome, :email, :senha, :data_nascimento, :genero)";
            $conn = ConnectionFactory::getConnection()->prepare($sql);
            $conn->bindValue(":nome", $pessoa->getNome());
            $conn->bindValue(":email", $pessoa->getEmail());
            $conn->bindValue(":senha", $pessoa->getSenha());
            $conn->bindValue(":data_nascimento", $pessoa->getDataNascimento());
            $conn->bindValue(":genero", $pessoa->getGenero());
            return $conn->execute(); // Executa o insert
        }catch(PDOException $ex){
            echo "<p> Erro </p> <p> $ex </p>";
        }
    }
}

?>