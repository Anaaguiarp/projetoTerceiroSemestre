<?php

    class Pessoa{
        private $id;
        private $nome;
        private $email;
        private $senha;
        private $data_nascimento;
        private $genero;

        public function __construct(){};

        public function __construct($id, $nome, $email, $senha, $data_nascimento, $genero){
            $this->id = $id;
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
            $this->data_nascimento = $data_nascimento;
            $this->genero = $genero;
        }

         public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getNome(){
            return $this->nome;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getSenha(){
            return $this->senha;
        }

        public function setSenha($senha){
            $this->senha = $senha;
        }

        public function getDataNascimento(){
            return $this->data_nascimento;
        }

        public function setDataNascimento($data_nascimento){
            $this->data_nascimento = $data_nascimento;
        }

        public function getGenero(){
            return $this->genero;
        }

        public function setGenero($genero){
            $this->genero = $genero;
        }

        public function __toString(){
            return "Testando. Nome: {$this->nome}. E-mail: {$this->email}. Data-nascimento: {$this->data_nascimento}.";
        }
    }
?>