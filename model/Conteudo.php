<?php
    class Conteudo{
        private $id;
        private $titulo;
        private $descricao;
        private $conteudo;
        private $data;

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }
        
        public function getTitulo(){
            return $this->titulo;
        }

        public function setTitulo($titulo){
            $this->titulo = $titulo;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }

        public function getConteudo(){
            return $this->conteudo;
        }

        public function setConteudo($conteudo){
            $this->conteudo = $conteudo;
        }

        public function getData(){
            return $this->data;
        }

        public function setData($data){
            $this->data = $data;
        }

        public function __toString(){
            return "Título: {$this->titulo}. Descrição: {$this->descricao} Conteúdo: {$this->conteudo} Data: {$this->data}";
        }
    }
?>