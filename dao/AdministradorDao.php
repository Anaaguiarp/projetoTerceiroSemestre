<?php

class AdministradorDao{
    
    public function inserir(Admin $admin){
        try{
            $sql = "INSERT INTO administrador (nome, email, senha, data_nascimento, genero, ultimoLogin, documento, formacao, especialidade) VALUES (:nome, :email, :senha, :data_nascimento, :genero, :ultimoLogin, :documento, :formacao, :especialidade)";
            $conn = ConnectionFactory::getConnection()->prepare($sql);
            $conn->bindValue(":nome", $admin->getNome());
            $conn->bindValue(":email", $admin->getEmail());
            $conn->bindValue(":senha", $admin->getSenha());
            $conn->bindValue(":data_nascimento", $admin->getDataNascimento());
            $conn->bindValue(":genero", $admin->getGenero());
            $conn->bindValue(":ultimoLogin", $admin->getUltimoLogin());
            $conn->bindValue(":documento", $admin->getDocumento());
            $conn->bindValue(":formacao", $admin->getFormacao());
            $conn->bindValue(":especialidade", $admin->getEspecialidade());
            return $conn->execute(); // Executa o insert
        }catch(PDOException $ex){
            echo "<p> Erro </p> <p> $ex </p>";
        }
    }
}

?>