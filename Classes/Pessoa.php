<?php

    class Pessoa{
        private $nome;
        private $data_nascimento;
        private $genero;


        public function getNome(){
            return $this->nome;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getDataNascimento(){
            return $this->data_nascimento;
        }

        public function setDataNascimento($data_nascimento){
            $this->data_nascimento = $data_nascimento;
        }

        public function getGenero(){
            
        }

        public function setGenero($genero){
            $this->genero = $genero;
        }
    }
?>